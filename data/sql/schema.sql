CREATE TABLE activity_index (keyword VARCHAR(200), field VARCHAR(50), position BIGINT, id BIGINT, PRIMARY KEY(keyword, field, position, id)) ENGINE = INNODB;
CREATE TABLE activity (id BIGINT AUTO_INCREMENT, title VARCHAR(255), activitytype_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX activitytype_id_idx (activitytype_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE activity_type (id BIGINT AUTO_INCREMENT, title VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE client_status (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE expensedata (id BIGINT AUTO_INCREMENT, renewal_expenses VARCHAR(20) NOT NULL, expense_inflation VARCHAR(20) NOT NULL, initial_expenses VARCHAR(20) NOT NULL, loadings VARCHAR(20) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE gender (id BIGINT AUTO_INCREMENT, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE marketdata (id BIGINT AUTO_INCREMENT, uploaded_at DATETIME NOT NULL, month_array TEXT NOT NULL, discounting_array TEXT NOT NULL, dhfactors_matrix TEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE quotehistory (id BIGINT AUTO_INCREMENT, client_id BIGINT, financialadvisor_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX client_id_idx (client_id), INDEX financialadvisor_id_idx (financialadvisor_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE system (id BIGINT AUTO_INCREMENT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE user_profile_index (keyword VARCHAR(200), field VARCHAR(50), position BIGINT, id BIGINT, PRIMARY KEY(keyword, field, position, id)) ENGINE = INNODB;
CREATE TABLE user_profile (id BIGINT AUTO_INCREMENT, sfuser_id BIGINT, gender_id BIGINT, spouse_gender_id BIGINT, status_id BIGINT, parent_user_profile_id BIGINT, name VARCHAR(30) NOT NULL, surname VARCHAR(30) NOT NULL, dob DATETIME NOT NULL, telephone VARCHAR(20) NOT NULL, mobile VARCHAR(20) NOT NULL, idnumber VARCHAR(20) NOT NULL, fax VARCHAR(20) NOT NULL, postaladdress VARCHAR(100) NOT NULL, streetaddress VARCHAR(100) NOT NULL, spousename VARCHAR(30) NOT NULL, spousesurname VARCHAR(30) NOT NULL, spousedob DATETIME NOT NULL, spouseidnumber VARCHAR(20) NOT NULL, company VARCHAR(30) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX sfuser_id_idx (sfuser_id), INDEX gender_id_idx (gender_id), INDEX spouse_gender_id_idx (spouse_gender_id), INDEX status_id_idx (status_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_forgot_password (id BIGINT AUTO_INCREMENT, user_id BIGINT NOT NULL, unique_key VARCHAR(255), expires_at DATETIME NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_group_permission (group_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(group_id, permission_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_permission (id BIGINT AUTO_INCREMENT, name VARCHAR(255) UNIQUE, description TEXT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_remember_key (id BIGINT AUTO_INCREMENT, user_id BIGINT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX user_id_idx (user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user (id BIGINT AUTO_INCREMENT, first_name VARCHAR(255), last_name VARCHAR(255), email_address VARCHAR(255) NOT NULL UNIQUE, username VARCHAR(128) NOT NULL UNIQUE, algorithm VARCHAR(128) DEFAULT 'sha1' NOT NULL, salt VARCHAR(128), password VARCHAR(128), is_active TINYINT(1) DEFAULT '1', is_super_admin TINYINT(1) DEFAULT '0', last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX is_active_idx_idx (is_active), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_group (user_id BIGINT, group_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, group_id)) ENGINE = INNODB;
CREATE TABLE sf_guard_user_permission (user_id BIGINT, permission_id BIGINT, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(user_id, permission_id)) ENGINE = INNODB;
ALTER TABLE activity_index ADD CONSTRAINT activity_index_id_activity_id FOREIGN KEY (id) REFERENCES activity(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE activity ADD CONSTRAINT activity_activitytype_id_activity_type_id FOREIGN KEY (activitytype_id) REFERENCES activity_type(id) ON DELETE CASCADE;
ALTER TABLE quotehistory ADD CONSTRAINT quotehistory_financialadvisor_id_sf_guard_user_id FOREIGN KEY (financialadvisor_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE quotehistory ADD CONSTRAINT quotehistory_client_id_sf_guard_user_id FOREIGN KEY (client_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE user_profile_index ADD CONSTRAINT user_profile_index_id_user_profile_id FOREIGN KEY (id) REFERENCES user_profile(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE user_profile ADD CONSTRAINT user_profile_status_id_client_status_id FOREIGN KEY (status_id) REFERENCES client_status(id);
ALTER TABLE user_profile ADD CONSTRAINT user_profile_spouse_gender_id_gender_id FOREIGN KEY (spouse_gender_id) REFERENCES gender(id);
ALTER TABLE user_profile ADD CONSTRAINT user_profile_sfuser_id_sf_guard_user_id FOREIGN KEY (sfuser_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE user_profile ADD CONSTRAINT user_profile_gender_id_gender_id FOREIGN KEY (gender_id) REFERENCES gender(id);
ALTER TABLE sf_guard_forgot_password ADD CONSTRAINT sf_guard_forgot_password_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_group_permission ADD CONSTRAINT sf_guard_group_permission_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_remember_key ADD CONSTRAINT sf_guard_remember_key_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_group ADD CONSTRAINT sf_guard_user_group_group_id_sf_guard_group_id FOREIGN KEY (group_id) REFERENCES sf_guard_group(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_user_id_sf_guard_user_id FOREIGN KEY (user_id) REFERENCES sf_guard_user(id) ON DELETE CASCADE;
ALTER TABLE sf_guard_user_permission ADD CONSTRAINT sf_guard_user_permission_permission_id_sf_guard_permission_id FOREIGN KEY (permission_id) REFERENCES sf_guard_permission(id) ON DELETE CASCADE;
