create table interesse (
  id int primary key auto_increment,
  id_prospecto int not null,
  chave varchar(250) not null,
  valor varchar(250) not null,
  datagerado datetime
);

insert into interesse(id_prospecto, chave, valor, datagerado)values(1,"vagas", '3', NOW());
insert into interesse(id_prospecto, chave, valor, datagerado)values(1,"suites", '1', NOW());
insert into interesse(id_prospecto, chave, valor, datagerado)values(1,"valor", '1000', NOW());
