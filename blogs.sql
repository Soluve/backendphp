CREATE TABLE IF NOT EXISTS `users` (
    `users_id` int NOT NULL primary key AUTO_INCREMENT,
    `username` varchar(100),
    `email` varchar(100),
    `password` varchar(255),
    `reg_at` timestamp default current_timestamp
);

CREATE TABLE IF NOT EXISTS `comments` (
    `comment_id` int NOT NULL primary key AUTO_INCREMENT,
    `user_id` int(11),
    `content` LONGTEXT,
    `blogs_id` int(11),
    `comment_at` timestamp default current_timestamp
);

CREATE TABLE IF NOT EXISTS `authors` (
    `author_id` int NOT NULL primary key AUTO_INCREMENT,
    `author_name` varchar(100),
    `email` varchar(100),
    `password` varchar(255),
    `blogs_id` varchar(200),
    `reg_at` timestamp default current_timestamp
);

CREATE TABLE IF NOT EXISTS `blogs` (
    `blogs_id` int NOT NULL primary key AUTO_INCREMENT,
    `user_id` int,
    `title` varchar(100),
    `content` LONGTEXT,
    `image_url` varchar(500),
    `author_id` int(11),
    `comment_id` varchar(100),
    `category_id` int(11),
    `reg_at` timestamp default current_timestamp
);

CREATE TABLE IF NOT EXISTS `admin` (
    `admin_id` int NOT NULL primary key AUTO_INCREMENT,
    `username` varchar(100),
    `email` varchar(100),
    `password` varchar(255)
);

CREATE TABLE IF NOT EXISTS `category` (
    `category_id` int NOT NULL primary key AUTO_INCREMENT,
    `type` varchar(100),
    `admin_id` int,
    CONSTRAINT FOREIGN KEY adminauth (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE
);
