<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function getAllUsers($filters = [], $keywords=null, $sortByArr=null, $perPage=null)
    {
    // $users = DB::select('SELECT * FROM users ORDER BY created_at DESC');
    DB::enableQueryLog();
    $users = DB::table($this->table)
    ->select('users.*', 'group.name as group_name')
    ->join('groups', 'users.group_id', '=', 'groups.id')
    ->where('trash', 0);
    $orderBy = 'users.create_at';
    $orderType = 'desc';
    if (!empty($sortByArr) && is_array($sortByArr)){
        if(!empty($sortByArr['sortBy'])&& !empty($sortByArr['sortType'])){
            $orderBy = trim($sortByArr['sortBy']);
            $sortType = trim($sortByArr['sortType']);
        }
    }
    $users = $users->orderBy($orderBy, $orderType);
    if (!empty($filters)){
        $users = $users->where($filters);
    }
    if (!empty($keywords)){
        $users = $users->where(function($query) use ($keywords){
            $query->orWhere('fullname', 'like', '%'.$keywords.'%');
            $query->orWhere('email', 'like', '%'.$keywords.'%');
        });
    }
    // $users= $users->get();
    $users = $users->paginate(3);
    if(!empty($perPage)){
        $users = $users->paginate($perPage)
    }else{
        $users=$users->get();
    }
    // $sql = DB::getQueryLog();
    // dd($sql);
    return $users;
    }

    public function addUser($data)
    {
        // DB::insert('INSERT INTO users (fullname, email, created_at) values (?,?,?)', $data);
        return DB::table($this->table)->insert($data);
    }

    public function getDetail($id)
    {
        return DB::select('SELECT * FROM ' . $this->table . ' WHERE id = ?', [$id]);
    }

    public function updateUser($data, $id){
        // $data[] = $id;
        // return DB::update('UPDATE'. $this->TABLE.'SET fullname=?, email=?, update_at=? where id = ?', $data);
        return BB::table($this->table)->where('id', $id)->update($data);
    }
    public function deleteUser($id){
    //    return DB::delete("DELETE FORM $this->table WHERE ID =?", [$id]);
        return DB::table($this->table)->where('id', $id)->delete();
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
        // $lists = DB::table('users')
        // ->select('users.*', 'group.name as group_name')
        // ->rightJoinJoin('groups', 'users.group_id', '=', 'group.id')
        // ->orderBy('create_at', 'asc')
        // ->orderBy('id', 'desc')
        // ->inRandomOrder()
        // ->select(DB::raw('count(id) as email_count'), 'email', 'fullname')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->having('email_count', '>=', 2)
        // ->limit(2)
        // ->offset(2)
        // ->take(2)
        // ->skip(2)
        // ->get();
        // dd($lists);
        // DB::table('users')->insert([
        //     'fullname'=> 'Nguyễn Văn A',
        //     'email' => 'nguyenvana@gmail.com',
        //     'group_id' =>1,
        //     'create_at' => date('Y-m-d H:i:s')
        // ]);
        // dd($lastId);
        // $status = DB::table('user')
        // ->where('id', 29)
        // ->update([
        //     'fullname'=> 'Nguyễn Văn A',
        //     'email' => 'nguyenvana@gmail.com',
        //     'update'=> date('Y-m-d H:i:s')
        // ]);
        // $status = DB::table('user')
        // ->where('id', 28)
        // ->delete();

        $lists = DB::table('user')
        // ->selectRaw('email, fullname, count(id) as email_count')
        // ->groupBy('email')
        // ->groupBy('fullname')
        // ->where(DB::raw('id>20'))
        // ->where('id', '>', 20)
        // ->orWhereRaw('id>20')
        // ->orderByRaw('create_at DESC', 'update_at ASC')
        // ->orderByRaw('email', 'fullname')
        // ->having('email_count', '>=', 2)
        // ->havingRaw('count(id) > ?', [2])
        // ->where(
        //     'group_id',
        //     '=',
        //     function ($query){
        //         $query ->select('id')
        //         ->from('groups')
        //         ->where('name', '=', 'Adminstrator');
        //     }
        // )
        // ->select('email', DB::raw('(SELECT count(id) FROM 'groups') as group_count'))
        // ->selectRaw('email, (SELECT count(id) FROM 'groups') as group_count')
        ->get();

        dd($lists);
        // Đếm số bản ghi

        $count = DB::table('users') ->where('id', '>', 20)->count();
        dd($count);

        $sql = DB::getQueryLog();
        dd($sql);

        $detail = DB::table($this->table)->first();
     }
}