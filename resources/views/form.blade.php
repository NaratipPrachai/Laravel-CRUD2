@extends('layout')

@section('title', 'เขียนบทความ')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4 text-center">เขียนบทความใหม่</h1>
        <form action="/insert" method="post" id="articleForm">
            @csrf
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">ชื่อบทความ</label>
                <input type="text" name="title" id="title" class="mt-1 p-3 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300">
                @error('title')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="container mx-auto mt-8">
                <label for="content" class="block text-sm font-medium text-gray-700">เนื้อหาบทความ</label>
                <textarea name="content" id="content" cols="30" rows="10" class="mt-1 p-3 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300 overflow-y-auto"></textarea>
                @error('content')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4 ">
                <button type="button" onclick="window.location.href='/blog'" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring focus:border-blue-300">บทความทั้งหมด</button>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">บันทึก</button>
                
            </div>
        </form>
    </div>
    <!-- สคริปต์สำหรับ SweetAlert -->
    <script>
        document.getElementById('articleForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = this;
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action, true);
            xhr.setRequestHeader('X-CSRF-Token', '{{ csrf_token() }}');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        Swal.fire({
                            title: 'สำเร็จ!',
                            text: 'เพิ่มบทความสำเร็จ',
                            icon: 'success',
                            confirmButtonText: 'ตกลง'
                        }).then(function() {
                            // Redirect ไปยังหน้า Blog หลังจากที่บันทึกสำเร็จ
                            window.location.href = '/blog';
                        });
                        form.reset();
                    } else {
                        alert('มีข้อผิดพลาดเกิดขึ้น โปรดลองอีกครั้ง');
                    }
                }
            };
            xhr.send(formData);
        });
    </script>
@endsection
