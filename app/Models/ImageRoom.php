<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ImageRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'image_room',
    ];
    // Đếm số lượng ảnh đổ ra trang quản lí ảnh tất cả khách sạn ;
    public function countImageRooms() {
        return DB::table('rooms')
            ->select('rooms.id', 'rooms.room_name', DB::raw('COUNT(image_rooms.id) as total_images'))
            ->leftJoin('image_rooms', 'rooms.id', '=', 'image_rooms.room_id')
            ->groupBy('rooms.id', 'rooms.room_name')
            ->orderByDesc('total_images')
            ->paginate(10);
    }

    // Lấy danh sách ảnh theo khách sạn ;
    public function listImagesRoom($room_id)
    {
        return $this->select('image_rooms.id', 'image_rooms.image_room')
            ->where('room_id', $room_id)
            ->get();
    }
}
