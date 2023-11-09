CREATE TABLE `INFORMATION`(
    `id_information` CHAR(36) NOT NULL,
    `id_size` CHAR(36) NOT NULL,
    `id_color` CHAR(36) NOT NULL,
    `id_brand` CHAR(36) NOT NULL,
    `amount` INT NOT NULL,
    `image` VARCHAR(255) NOT NULL,
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
CREATE TABLE `SHOES` (
    `id_shoe` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `price` DOUBLE NOT NULL,
    `id_information` CHAR(36) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

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
    `id_shoe` INT NOT NULL,
    `quantity` INT NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY `uk_id_shoe` (`id_shoe`)
);
ALTER TABLE
    `ORDER` ADD PRIMARY KEY(`id_order`);
CREATE TABLE `USERS`(
    `id_user` CHAR(36) NOT NULL,
    `name` VARCHAR(250) NOT NULL,
    `email` VARCHAR(250) NOT NULL,
    `password` VARCHAR(500) NOT NULL,
    `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
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
    `ORDER` ADD CONSTRAINT `order_id_shoe_foreign` FOREIGN KEY(`id_shoe`) REFERENCES `SHOES`(`id_shoe`);
ALTER TABLE
    `ORDER` ADD CONSTRAINT `order_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `USERS`(`id_user`);
ALTER TABLE
    `COMMENT` ADD CONSTRAINT `comment_id_user_foreign` FOREIGN KEY(`id_user`) REFERENCES `USERS`(`id_user`);
ALTER TABLE
    `INFORMATION` ADD CONSTRAINT `information_id_size_foreign` FOREIGN KEY(`id_size`) REFERENCES `SIZE`(`id_size`);
ALTER TABLE
    `SHOES` ADD CONSTRAINT `shoes_id_information_foreign` FOREIGN KEY(`id_information`) REFERENCES `INFORMATION`(`id_information`);
ALTER TABLE
    `COMMENT` ADD CONSTRAINT `comment_id_shoe_foreign` FOREIGN KEY(`id_shoe`) REFERENCES `SHOES`(`id_shoe`);


    