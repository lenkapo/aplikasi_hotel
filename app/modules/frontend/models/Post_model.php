<?php
class Post_model extends CI_Model
{
    public function get_all_posts($limit, $offset)
    {
        $this->db->select("
            posts.id,
            posts.title,
            posts.slug,
            posts.content,
            posts.thumbnail,
            posts.created_at,
            users.name AS author_name,
            (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count
    ");
        $this->db->from("posts");
        $this->db->join("users", "users.id = posts.user_id", "left");
        $this->db->join("comments", "comments.post_id = posts.id", "left");
        $this->db->group_by("posts.id");
        $this->db->limit($limit, $offset);
        $this->db->order_by("posts.created_at", "DESC");

        return $this->db->get()->result();
    }

    public function count_posts()
    {
        return $this->db->count_all("posts");
    }

    public function get_recent_posts($limit)
    {
        $this->db->select("id, title, slug, thumbnail, created_at");
        $this->db->from("posts");
        $this->db->order_by("created_at", "DESC");
        $this->db->limit($limit);

        return $this->db->get()->result();
    }

    public function get_post_by_slug($slug)
    {
        return $this->db->select("
            posts.*,
            users.name AS author_name,
            categories.name AS category_name,
            (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count
        ")
            ->from('posts')
            ->join('users', 'users.id = posts.user_id', 'left')
            ->join('categories', 'categories.id = posts.category_id', 'left')
            ->where('posts.slug', $slug)
            ->get()
            ->row();
    }


    public function get_popular_posts($limit = 5)
    {
        $this->db->select("
        posts.*,
        users.name AS author_name,
        categories.name AS category_name,
        (SELECT COUNT(*) FROM comments WHERE comments.post_id = posts.id) AS comment_count
    ");
        $this->db->from("posts");
        $this->db->join("users", "users.id = posts.user_id", "left");
        $this->db->join("categories", "categories.id = posts.category_id", "left");

        // Tidak pakai views → pakai tanggal terbaru saja
        $this->db->order_by("posts.created_at", "DESC");

        $this->db->limit($limit);
        return $this->db->get()->result();
    }
    public function get_popular_tags($limit = 10)
    {
        $this->db->select('tags.*, COUNT(post_tags.tag_id) as tag_count');
        $this->db->from('tags');
        $this->db->join('post_tags', 'post_tags.tag_id = tags.id', 'left');
        $this->db->group_by('tags.id');
        $this->db->order_by('tag_count', 'DESC');
        $this->db->limit($limit);

        return $this->db->get()->result();
    }


    // comment functions
    public function get_comments($post_id)
    {
        return $this->db
            ->where('post_id', $post_id)
            ->order_by('created_at', 'DESC')
            ->get('comments')
            ->result();
    }


    // Quotes Function
    public function get_quotes($id)
    {
        return $this->db->get_where('quotes', ['id' => $id])->row();
    }

    // Topics Model
    public function getTopicsByPost($post_id)
    {
        $this->db->select('topics.*');
        $this->db->from('post_topics');
        $this->db->join('topics', 'topics.id = post_topics.topic_id');
        $this->db->where('post_topics.post_id', $post_id);
        return $this->db->get()->result();
    }

    // get Limit per Topics
    public function get_limit_topics($limit = 10)
    {
        return $this->db->limit($limit)
            ->get('topics')
            ->result();
    }
    // Get Hot Topics
    public function get_hot_topics($limit = 5)
    {
        return $this->db->where('is_hot', 1)
            ->limit($limit)
            ->get('topics')
            ->result();
    }
    // Get top Topics
    public function get_top_topics($limit = 10)
    {
        return $this->db->select("topics.id, topics.name, topics.slug, COUNT(post_topics.post_id) AS post_count")
            ->from("topics")
            ->join("post_topics", "post_topics.topic_id = topics.id", "left")
            ->group_by("topics.id")
            ->order_by("post_count", "DESC")
            ->limit($limit)
            ->get()
            ->result();
    }
}
