<?php
namespace config;

use DatabaseService;

require './config/database.php';
class SchemaService
{
    private $connection;
    public function __construct() {
        $db = new DatabaseService;
        $this->connection = $db->getConnection();
    }
    public function createSchema()
    {
        $sql = "CREATE TABLE `ORDER_ITEM`(
            `id_order_item` CHAR(36) NOT NULL,
            `id_shoe` INT NOT NULL
        );
        ALTER TABLE
            `ORDER_ITEM` ADD PRIMARY KEY(`id_order_item`);
        CREATE TABLE `INFORMATION`(
            `id_information` CHAR(36) NOT NULL,
            `id_shoe_type` CHAR(36) NOT NULL,
            `id_size` CHAR(36) NOT NULL,
            `id_color` CHAR(36) NOT NULL,
            `id_brand` CHAR(36) NOT NULL,
            `description` TEXT NOT NULL
        );
        ALTER TABLE
            `INFORMATION` ADD PRIMARY KEY(`id_information`);
        CREATE TABLE `BRAND`(
            `id_brand` CHAR(36) NOT NULL,
            `name` VARCHAR(255) NOT NULL
        );
        ALTER TABLE
            `BRAND` ADD PRIMARY KEY(`id_brand`);
        CREATE TABLE `SHOES`(
            `id_shoe` INT NOT NULL,
            `name` VARCHAR(255) NOT NULL,
            `price` DOUBLE NOT NULL,
            `id_information` CHAR(36) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL
        );
        ALTER TABLE
            `SHOES` ADD PRIMARY KEY(`id_shoe`);
        CREATE TABLE `COLOR`(
            `id_color` CHAR(36) NOT NULL,
            `name` VARCHAR(255) NOT NULL
        );
        ALTER TABLE
            `COLOR` ADD PRIMARY KEY(`id_color`);
        CREATE TABLE `COMMENT`(
            `id_comment` CHAR(36) NOT NULL,
            `content` TEXT NOT NULL,
            `id_user` CHAR(36) NOT NULL,
            `id_shoe` INT NOT NULL
        );
        ALTER TABLE
            `COMMENT` ADD PRIMARY KEY(`id_comment`);
        CREATE TABLE `ORDER`(
            `id_order` CHAR(36) NOT NULL,
            `id_user` CHAR(36) NOT NULL,
            `id_order_item` CHAR(36) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL
        );
        ALTER TABLE
            `ORDER` ADD PRIMARY KEY(`id_order`);
        CREATE TABLE `SHOE_TYPE`(
            `id_shoe_type` CHAR(36) NOT NULL,
            `name` VARCHAR(255) NOT NULL
        );
        ALTER TABLE
            `SHOE_TYPE` ADD PRIMARY KEY(`id_shoe_type`);
        CREATE TABLE `USERS`(
            `id_user` CHAR(36) NOT NULL,
            `name` VARCHAR(250) NOT NULL,
            `email` VARCHAR(250) NOT NULL,
            `password` VARCHAR(500) NOT NULL,
            `is_admin` TINYINT(1) NOT NULL,
            `created_at` DATETIME NOT NULL,
            `updated_at` DATETIME NOT NULL
        );
        ALTER TABLE
            `USERS` ADD PRIMARY KEY(`id_user`);
        CREATE TABLE `SIZE`(
            `id_size` CHAR(36) NOT NULL,
            `name` VARCHAR(255) NOT NULL
        );
        ALTER TABLE
            `SIZE` ADD PRIMARY KEY(`id_size`);
        ALTER TABLE
            `INFORMATION` ADD CONSTRAINT `information_id_color_foreign` FOREIGN KEY(`id_color`) REFERENCES `COLOR`(`id_color`);
        ALTER TABLE
            `INFORMATION` ADD CONSTRAINT `information_id_brand_foreign` FOREIGN KEY(`id_brand`) REFERENCES `BRAND`(`id_brand`);
        ALTER TABLE
            `ORDER_ITEM` ADD CONSTRAINT `order_item_id_shoe_foreign` FOREIGN KEY(`id_shoe`) REFERENCES `SHOES`(`id_shoe`);
        ALTER TABLE
            `COMMENT` ADD CONSTRAINT `comment_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `USERS`(`id_user`);
        ALTER TABLE
            `ORDER` ADD CONSTRAINT `order_id_order_item_foreign` FOREIGN KEY(`id_order_item`) REFERENCES `ORDER_ITEM`(`id_order_item`);
        ALTER TABLE
            `INFORMATION` ADD CONSTRAINT `information_id_size_foreign` FOREIGN KEY(`id_size`) REFERENCES `SIZE`(`id_size`);
        ALTER TABLE
            `ORDER` ADD CONSTRAINT `order_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `USERS`(`id_user`);
        ALTER TABLE
            `INFORMATION` ADD CONSTRAINT `information_id_shoe_type_foreign` FOREIGN KEY(`id_shoe_type`) REFERENCES `SHOE_TYPE`(`id_shoe_type`);
        ALTER TABLE
            `SHOES` ADD CONSTRAINT `shoes_id_information_foreign` FOREIGN KEY(`id_information`) REFERENCES `INFORMATION`(`id_information`);
        ALTER TABLE
            `COMMENT` ADD CONSTRAINT `comment_id_shoe_foreign` FOREIGN KEY(`id_shoe`) REFERENCES `SHOES`(`id_shoe`);";
        $this->connection->query($sql);
    }
}
