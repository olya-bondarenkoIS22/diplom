-- Создание таблицы roles
CREATE TABLE roles (
    id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(255) NOT NULL
);

-- Создание таблицы categories
CREATE TABLE categories (
    id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL
);

-- Создание таблицы users
CREATE TABLE users (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone_number VARCHAR(50) NOT NULL UNIQUE,
    date_registration DATE NOT NULL,
    id_role SMALLINT NOT NULL,
    CONSTRAINT fk_users_to_roles
    FOREIGN KEY (id_role) REFERENCES roles (id) ON DELETE CASCADE
);

-- Создание таблицы delivery_addresses
CREATE TABLE delivery_addresses (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    delivery_address TEXT NOT NULL
);

-- Создание таблицы payment_methods
CREATE TABLE payment_methods (
    id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    payment_method VARCHAR(255) NOT NULL
);

-- Создание таблицы statuses
CREATE TABLE statuses (
    id SMALLINT AUTO_INCREMENT PRIMARY KEY,
    status VARCHAR(255) NOT NULL
);

-- Создание таблицы blogs
CREATE TABLE blogs (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    id_user BIGINT NOT NULL,
    blog_name VARCHAR(255) NOT NULL,
    created_date DATE NOT NULL,
    CONSTRAINT fk_blogs_to_users
    FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE
);

-- Создание таблицы antique_items (исправлено опечатку antiquel_items)
CREATE TABLE antique_items (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    date_added DATE NOT NULL,
    available BOOLEAN NOT NULL,
    id_blog BIGINT NOT NULL,
    id_category SMALLINT NOT NULL,
    CONSTRAINT fk_antiqueitems_to_blogs
    FOREIGN KEY (id_blog) REFERENCES blogs (id) ON DELETE CASCADE,
    CONSTRAINT fk_antiqueitems_to_categories
    FOREIGN KEY (id_category) REFERENCES categories (id) ON DELETE CASCADE
);

-- Создание таблицы images
CREATE TABLE images (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    id_antique_item BIGINT NOT NULL,
    image TEXT NOT NULL,
    CONSTRAINT fk_images_to_antiqueitems
    FOREIGN KEY (id_antique_item) REFERENCES antique_items (id) ON DELETE CASCADE
);

-- Создание таблицы orders
CREATE TABLE orders (
    id BIGINT AUTO_INCREMENT PRIMARY KEY,
    id_user BIGINT NOT NULL,
    id_antique_item BIGINT NOT NULL,
    id_status SMALLINT NOT NULL,
    id_payment_method SMALLINT NOT NULL,
    id_delivery_address BIGINT NOT NULL,
    created_date DATETIME NOT NULL,
    CONSTRAINT fk_orders_to_users
    FOREIGN KEY (id_user) REFERENCES users (id) ON DELETE CASCADE,
    CONSTRAINT fk_orders_to_antiqueitems
    FOREIGN KEY (id_antique_item) REFERENCES antique_items (id) ON DELETE CASCADE,
    CONSTRAINT fk_orders_to_statuses
    FOREIGN KEY (id_status) REFERENCES statuses (id) ON DELETE CASCADE,
    CONSTRAINT fk_orders_to_paymentmethods
    FOREIGN KEY (id_payment_method) REFERENCES payment_methods (id) ON DELETE CASCADE,
    CONSTRAINT fk_orders_to_deliveryaddresses
    FOREIGN KEY (id_delivery_address) REFERENCES delivery_addresses (id) ON DELETE CASCADE
);