<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers()
    {
    $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');
    return $users;
    }

    public function addUser($data)
    {
        DB::insert('INSERT INTO users (fullname, email, created_at) values (?,?,?)', $data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id){
        $data[] = $id;
        return DB::update('UPDATE'. $this->TABLE.'SET fullname=?, email=?, update_at=? where id = ?', $data);
    }
    public function deleteUser($id){
       return DB::delete("DELETE FORM $this->table WHERE ID =?", [$id]);
    }
    public function statementUser($sql){
        return DB::statement($sql);
     }
     public function learnQueryBuilder(){
        DB::enableQueryLog();
        // lấy tất cả bản ghi của table
        $id = 20;
        // $lists = DB::table($this->table)
        // ->select('fullname as hoten', 'eamil', 'id')
        // ->where('id', 18)
        //-> where(function ($query) use ($id){
            //   $query->where('id','<',$id)->orWhere('id', '>', $id);
        // })
        // ->where ('fullname', 'Like', '%van quan%')
        // ->whereBetween('id', [18, 20])
        // ->whereNotBetween('id', [18, 20])
        // ->whereNotIn('id), [18,20])
        // ->whereNull('update')
        // ->whereYear('create_at', '2021')
        // whereColumn('create_at', '<>', 'update_at)
        // ->get();
        // ->toSql();

        // join bảng
        $lists = DB::table('users')
        // ->select('users.*', 'group.name as group_name')
        // ->rightJoinJoin('groups', 'users.group_id', '=', 'group.id')
        // ->orderBy('create_at', 'asc')
        // ->orderBy('id', 'desc')
        // ->inRandomOrrders()
        // ->select(DB::raw('count(id) as email_count'), 'email', 'fullname')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->having('email_count', '>=', 2)
        // ->limit(2)
        // ->offset(2)
        ->take(2)
        ->skip(2)
        ->get();
        // dd($lists);
        $sql = DB::getQueryLog();
        dd($sql);

        $detail = DB::table($this->table)->first();
     }
}