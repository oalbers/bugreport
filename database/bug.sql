CREATE TABLE status (
 id integer auto_increment not null primary key,
 status varchar(100) not null,
 index(status)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE classification (
 id integer auto_increment not null primary key,
 classification varchar(100) not null,
 index(classification)
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE bugreport (
 id integer auto_increment not null primary key,
 title varchar(100) not null,
 description text not null,
 user_id integer not null,
 status_id integer not null,
 classification_id integer not null,
 foreign key (user_id) references user(id)	
	on update cascade on delete restrict,
  foreign key (status_id) references status(id)	
	on update cascade on delete restrict,
 foreign key (classification_id) references classification(id)	
	on update cascade on delete restrict,
 fulltext(title,description)	
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;

CREATE TABLE comment (
 id integer auto_increment not null primary key,
 comment varchar(255) not null,
 user_id integer not null,
 bug_id integer not null,
 foreign key (user_id) references user(id)	
	on update cascade on delete restrict,
 foreign key (bug_id) references bugreport(id)	
	on update cascade on delete restrict
) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB;
