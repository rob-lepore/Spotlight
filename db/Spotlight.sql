-- Database Section
-- ________________ 

create database Spotlight;
use Spotlight;


-- Tables Section
-- _____________ 

create table COMMENT (
     comment_id int not null AUTO_INCREMENT,
     notification_id int not null,
     text char(100) not null,
     date date not null,
     post_id int not null,
     username char(15) not null,
     constraint ID_COMMENT_ID primary key (comment_id),
     constraint FKFROM_COMMENT_ID unique (notification_id));

create table FOLLOWS (
     Follower_username char(15) not null,
     username char(15) not null,
     constraint ID_FOLLOWS_ID primary key (username, Follower_username));

create table FRIENDS (
     Friend_username char(15) not null,
     username char(15) not null,
     constraint ID_FRIENDS_ID primary key (username, Friend_username));

create table LIKES (
     element_link char(128) not null,
     username char(15) not null,
     constraint ID_LIKES_ID primary key (element_link, username));

create table LIKES_POST (
     post_id int not null,
     username char(15) not null,
     constraint ID_LIKES_POST_ID primary key (post_id, username));

create table LIKES_REVIEW (
     review_id int not null,
     username char(15) not null,
     isLike boolean not null,
     constraint ID_LIKES_REVIEW_ID primary key (review_id, username));

create table LOGIN_ATTEMPTS (
     time int not null,
     username char(15) not null,
     constraint IDLOGIN_ATTEMPTS primary key (username));

create table MOOD (
     mood_id int not null AUTO_INCREMENT,
     username char(15) not null,
     emoji char(12) not null,
     song char(50) not null,
     date date not null,
     constraint ID_MOOD_ID primary key (mood_id),
     constraint FKPOSTS_MOOD_ID unique (username));

create table NOTIFICATION (
     notification_id int not null AUTO_INCREMENT,
     date date not null,
     username char(15) not null,
     review_id int,
     post_id int,
     mood_id int,
     constraint ID_NOTIFICATION_ID primary key (notification_id));

create table POST (
     post_id int not null AUTO_INCREMENT,
     text char(200) not null,
     song char(128) not null,
     date date not null,
     number_of_likes int not null,
     username char(15) not null,
     constraint ID_POST_ID primary key (post_id));

create table REACTS_TO_MOOD (
     mood_id int not null,
     username char(15) not null,
     react_emoji char(20) not null,
     constraint ID_REACTS_TO_MOOD_ID primary key (mood_id, username));

create table REVIEW (
     review_id int not null AUTO_INCREMENT,
     text text not null,
     album char(128) not null,
     date date not null,
     score int not null,
     number_of_likes int not null,
     number_of_dislikes int not null,
     username char(15) not null,
     constraint ID_REVIEW_ID primary key (review_id));

create table SPOTIFY_ELEMENT (
     type char(6) not null,
     element_link char(128) not null,
     constraint ID_SPOTIFY_ELEMENT_ID primary key (element_link));

create table USER (
     username char(15) not null,
     password char(128) not null,
     salt char(128) not null,
     email char(40) not null,
     first_name char(20) not null,
     last_name char(20) not null,
     profile_pic char(128) DEFAULT default_icon.png,
     constraint ID_USER_ID primary key (username));


-- Constraints Section
-- ___________________ 

alter table COMMENT add constraint FKON_FK
     foreign key (post_id)
     references POST (post_id);

alter table COMMENT add constraint FKFROM_COMMENT_FK
     foreign key (notification_id)
     references NOTIFICATION (notification_id);

alter table COMMENT add constraint FKCOMMENTS_FK
     foreign key (username)
     references USER (username);

alter table FOLLOWS add constraint FKFOLLOWER
     foreign key (username)
     references USER (username);

alter table FOLLOWS add constraint FKFOL_USE_FK
     foreign key (Follower_username)
     references USER (username);

alter table FRIENDS add constraint FKFRIEND
     foreign key (username)
     references USER (username);

alter table FRIENDS add constraint FKFRI_USE_FK
     foreign key (Friend_username)
     references USER (username);

alter table LIKES add constraint FKLIK_USE_2_FK
     foreign key (username)
     references USER (username);

alter table LIKES add constraint FKLIK_SPO
     foreign key (element_link)
     references SPOTIFY_ELEMENT (element_link);

alter table LIKES_POST add constraint FKLIK_USE_1_FK
     foreign key (username)
     references USER (username);

alter table LIKES_POST add constraint FKLIK_POS
     foreign key (post_id)
     references POST (post_id);

alter table LIKES_REVIEW add constraint FKLIK_USE_FK
     foreign key (username)
     references USER (username);

alter table LIKES_REVIEW add constraint FKLIK_REV
     foreign key (review_id)
     references REVIEW (review_id);

alter table LOGIN_ATTEMPTS add constraint FKTRIES_FK
     foreign key (username)
     references USER (username);

alter table MOOD add constraint FKPOSTS_MOOD_FK
     foreign key (username)
     references USER (username);

alter table NOTIFICATION add constraint FKRECEIVES_FK
     foreign key (username)
     references USER (username);

alter table NOTIFICATION add constraint FKFROM_REVIEW_FK
     foreign key (review_id)
     references REVIEW (review_id);

alter table NOTIFICATION add constraint FKFROM_POST_FK
     foreign key (post_id)
     references POST (post_id);

alter table NOTIFICATION add constraint FKFROM_MOOD_FK
     foreign key (mood_id)
     references MOOD (mood_id);

alter table POST add constraint FKPOSTS_FK
     foreign key (username)
     references USER (username);

alter table REACTS_TO_MOOD add constraint FKREA_USE_FK
     foreign key (username)
     references USER (username);

alter table REACTS_TO_MOOD add constraint FKREA_MOO
     foreign key (mood_id)
     references MOOD (mood_id);

alter table REVIEW add constraint FKPUBLISHES_REVIEW_FK
     foreign key (username)
     references USER (username);

-- Not implemented
-- alter table SPOTIFY_ELEMENT add constraint ID_SPOTIFY_ELEMENT_CHK
--     check(exists(select * from LIKES
--                  where LIKES.element_link = element_link)); 


-- Index Section
-- _____________ 

create unique index ID_COMMENT_IND
     on COMMENT (comment_id);

create index FKON_IND
     on COMMENT (post_id);

create unique index FKFROM_COMMENT_IND
     on COMMENT (notification_id);

create index FKCOMMENTS_IND
     on COMMENT (username);

create unique index ID_FOLLOWS_IND
     on FOLLOWS (username, Follower_username);

create index FKFOL_USE_IND
     on FOLLOWS (Follower_username);

create unique index ID_FRIENDS_IND
     on FRIENDS (username, Friend_username);

create index FKFRI_USE_IND
     on FRIENDS (Friend_username);

create unique index ID_LIKES_IND
     on LIKES (element_link, username);

create index FKLIK_USE_2_IND
     on LIKES (username);

create unique index ID_LIKES_POST_IND
     on LIKES_POST (post_id, username);

create index FKLIK_USE_1_IND
     on LIKES_POST (username);

create unique index ID_LIKES_REVIEW_IND
     on LIKES_REVIEW (review_id, username);

create index FKLIK_USE_IND
     on LIKES_REVIEW (username);

create index FKTRIES_IND
     on LOGIN_ATTEMPTS (username);

create unique index ID_MOOD_IND
     on MOOD (mood_id);

create unique index FKPOSTS_MOOD_IND
     on MOOD (username);

create unique index ID_NOTIFICATION_IND
     on NOTIFICATION (notification_id);

create index FKRECEIVES_IND
     on NOTIFICATION (username);

create index FKFROM_REVIEW_IND
     on NOTIFICATION (review_id);

create index FKFROM_POST_IND
     on NOTIFICATION (post_id);

create index FKFROM_MOOD_IND
     on NOTIFICATION (mood_id);

create unique index ID_POST_IND
     on POST (post_id);

create index FKPOSTS_IND
     on POST (username);

create unique index ID_REACTS_TO_MOOD_IND
     on REACTS_TO_MOOD (mood_id, username);

create index FKREA_USE_IND
     on REACTS_TO_MOOD (username);

create unique index ID_REVIEW_IND
     on REVIEW (review_id);

create index FKPUBLISHES_REVIEW_IND
     on REVIEW (username);

create unique index ID_SPOTIFY_ELEMENT_IND
     on SPOTIFY_ELEMENT (element_link);

create unique index ID_USER_IND
     on USER (username);

