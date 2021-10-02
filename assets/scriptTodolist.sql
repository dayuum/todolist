use todo;

drop table if exists todo;

create table todo(
    id INT PRIMARY KEY NOT NULL auto_increment,
    tache VARCHAR(100)
);

drop table if exists archive;
create table archive(
    id INT PRIMARY KEY NOT NULL auto_increment,
    tache VARCHAR(100),
    moment date
);

select * from todo;
select * from archive;