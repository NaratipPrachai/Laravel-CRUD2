@extends('layout')

@section('title', 'บทความทั้งหมด')

@section('content')
    <h1 class="text-3xl font-bold mb-4 text-black text-center py-2">บทความทั้งหมด</h1>

    <div class="overflow-x-auto text-center">
         
        <table class="min-w-full divide-y divide-gray-200 border">
            <thead class="bg-gray-900">
                <tr>
                    <th scope="col" class="px-8 py-4 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                        ชื่อบทความ
                    </th>
                    <th scope="col" class="border-l px-8 py-4 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                        สถานะ
                    </th>
                    <th scope="col" class="border-l px-8 py-4 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                        ลบบทความ
                    </th>
                    <th scope="col" class="border-l px-8 py-4 text-left text-xs font-medium text-white uppercase tracking-wider text-center">
                        แก้ไข
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($blogs->reverse() as $blog)
                    <tr>
                        <td class="px-8 py-4 whitespace-nowrap text-black">
                            {{ $blog->title }}
                        </td>
            
                       
                        <td class="border-l px-8 py-4 whitespace-nowrap">
                            @if ($blog->status)
                                <form id="statusForm{{ $blog->id }}" action="{{ route('blog.change', $blog->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        เผยแพร่
                                    </button>
                                </form>
                            @else
                                <form id="statusForm{{ $blog->id }}" action="{{ route('blog.change', $blog->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        ฉบับล่าง
                                    </button>
                                </form>
                            @endif
                        </td>
                        
                        <td class="border-l px-8 py-4 whitespace-nowrap">
                            <form id="deleteForm{{ $blog->id }}" action="/delete/{{ $blog->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 focus:outline-none focus:ring focus:border-blue-300"
                                    onclick="deleteBlog('{{ $blog->id }}')">
                                    <span class="bi bi-trash mr-1"></span> <!-- ใช้ไอคอนของ Bootstrap -->
                                    ลบ
                                </button>
                            </form>
                        </td>
            
                        <td class="border-l px-8 py-4 whitespace-nowrap">
                            <form id="editForm{{ $blog->id }}" action="{{ route('blog.edit', $blog->id) }}" method="get">
                                @csrf
                                <button type="submit" class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    <span class="bi bi-pencil-square mr-1"></span> <!-- ใช้ไอคอนของ Bootstrap -->
                                    แก้ไข
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
       

    </div>

    <script>
        function deleteBlog(blog_id) {
            Swal.fire({
                title: "คุณแน่ใจหรือไม่?",
                text: "คุณต้องการที่จะลบบทความนี้หรือไม่?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "ใช่, ฉันต้องการลบ!",
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    // แสดง swal และค้างไว้ 3 วินาที
                    Swal.fire(
                        'ลบสำเร็จ!',
                        'บทความถูกลบแล้ว',
                        'success'
                    );

                    // ส่ง form และรอการเสร็จสิ้นด้วย callback function
                    setTimeout(function() {
                        document.getElementById('deleteForm' + blog_id).submit();
                    }, 2000);
                }
            });
        }
    </script>
   
   <div class="p-2" style="color: blue;">{{$blogs->links()}}</div>
   @if($blogs->isEmpty())
   <p class="text-center text-gray-500">ไม่มีบทความในระบบ</p>
@endif

@endsection
