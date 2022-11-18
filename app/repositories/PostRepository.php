<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Capsule\Manager;

/**
 * @property string $table
 * @property Manager $db
 */
class PostRepository implements Repository
{
    public function __construct(Manager $db)
    {
        $this->table = "posts";
        $this->db = $db;
    }

    public function find($id) : ?Post
    {
        return $this->db->table($this->table)->get($id) ?? null;
    }

    public function findAll()
    {
        return $this->db->table($this->table)->get();
    }

    public function create(Post $post) : bool
    {
        return $this->db->table('posts')->insert([
            ['title' => $post->title, 'content' => $post->content]
        ]);
    }

    public function update(Post $post) : void
    {
        $update = get_object_vars($post);
        $this->db->table($this->table)
            ->where('id', $post->id)
            ->update($update);
    }

    public function destroy(int $id) : void
    {
        $this->db->table('posts')->delete($id);
    }
}