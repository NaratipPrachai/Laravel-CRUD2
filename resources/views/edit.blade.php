@extends('layout')

@section('title', 'แก้ไขบทความ')

@section('content')
    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-bold mb-4 text-center">แก้ไขบทความ</h1>
        
        <form action="{{ route('blog.update', $blog->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">ชื่อบทความ</label>
                <input type="text" name="title" id="title" value="{{ $blog->title }}" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="content" class="block text-sm font-medium text-gray-700">เนื้อหาบทความ</label>
                <textarea name="content" id="content" cols="30" rows="10" class="mt-1 p-3 border rounded-md w-full focus:outline-none focus:ring focus:border-blue-300 overflow-y-auto">{{ $blog->content }}</textarea>
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">อัพเดท</button>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">บทความทั้งหมด</button>

            </div>
        </form>
    </div>
@endsection
