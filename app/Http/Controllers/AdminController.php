<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
{
    // Fetch blogs data ordered by the most recent
    $blogs = DB::table('blogs')->orderBy('id', 'desc')->paginate(10);
    
    // Pass the fetched data to the 'blog' view
    return view('blog', compact('blogs'));
}


    

    public function about()
    {
       $name="โจโจ้";
       $date="10 เมษา 2567";
       return view('about', compact('name', 'date'));
    }

    public function create()
    {
        return view('form');
    }
    
    public function insert(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required'
        ], [
            'title.required' => 'กรุณาป้อนชื่อบทความ',
            'title.max' => 'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
            'content.required' => 'กรุณาป้อนเนื้อหาบทความของคุณ'
        ]);
        
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        
        DB::table('blogs')->insert($data);
    
        // ใช้ SweetAlert แสดงข้อความแจ้งเตือน
        return redirect()->route('blog')->with('success', 'บทความถูกเพิ่มเรียบร้อยแล้ว');
    }
    

    public function destroy($id)
    {
        // ลบบทความที่มี ID ที่ระบุ
        DB::table('blogs')->where('id', $id)->delete();

        // Redirect กลับไปยังหน้าเดิมพร้อมกับข้อความแจ้งเตือน
        return redirect()->route('blog')->with('success', 'ลบบทความสำเร็จ');
    }
    
    public function change($id)
    {
        // ดึงข้อมูลบทความจากฐานข้อมูลด้วย $id
        $blog = DB::table('blogs')->where('id', $id)->first();
    
        // กำหนดสถานะใหม่ของบทความ
        $newStatus = !$blog->status; // สลับสถานะ
    
        // อัปเดตสถานะในฐานข้อมูล
        DB::table('blogs')->where('id', $id)->update(['status' => $newStatus]);
    
        // Redirect กลับไปยังหน้าเดิมพร้อมกับข้อความแจ้งเตือน
        return redirect()->route('blog')->with('success', 'เปลี่ยนสถานะบทความสำเร็จ');
    }

    public function edit($id)
    {
        // ดึงข้อมูลของบทความที่ต้องการแก้ไข
        $blog = DB::table('blogs')->find($id);
        
        // ตรวจสอบว่าพบบทความหรือไม่
        if (!$blog) {
            // หากไม่พบบทความ สามารถ redirect ไปยังหน้าที่ต้องการได้
            return redirect()->route('blog')->with('error', 'ไม่พบบทความที่ต้องการแก้ไข');
        }
        
        // นำข้อมูลบทความไปแสดงใน view แก้ไข
        return view('edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        // ตรวจสอบและกำหนดเงื่อนไขสำหรับการอัปเดตข้อมูลบทความ
        $request->validate([
            'title' => 'required|max:50',
            'content' => 'required'
        ], [
            'title.required' => 'กรุณาป้อนชื่อบทความ',
            'title.max' => 'ชื่อบทความไม่ควรเกิน 50 ตัวอักษร',
            'content.required' => 'กรุณาป้อนเนื้อหาบทความของคุณ'
        ]);

        // อัปเดตข้อมูลบทความในฐานข้อมูล
        $data = [
            'title' => $request->title,
            'content' => $request->content
        ];
        DB::table('blogs')->where('id', $id)->update($data);

        // ส่งกลับไปยังหน้าที่คุณต้องการหลังจากการอัปเดตข้อมูล
        return redirect()->route('blog.index')->with('success', 'บทความถูกอัปเดตเรียบร้อยแล้ว');
    }
}
