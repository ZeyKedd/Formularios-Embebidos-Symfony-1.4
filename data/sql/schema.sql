CREATE TABLE product (id BIGSERIAL, name VARCHAR(255) NOT NULL, price NUMERIC(18,2) NOT NULL, PRIMARY KEY(id));
CREATE TABLE product_photo (id BIGSERIAL, product_id BIGINT, filename VARCHAR(255), caption VARCHAR(255) NOT NULL, PRIMARY KEY(id));
ALTER TABLE product_photo ADD CONSTRAINT product_photo_product_id_product_id FOREIGN KEY (product_id) REFERENCES product(id) ON DELETE cascade NOT DEFERRABLE INITIALLY IMMEDIATE;
