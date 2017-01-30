create table config (
  id int primary key auto_increment,
  nome_loja varchar(150) not null,
  cor_primaria varchar(20) default '#999',
  cor_secundaria varchar(20) default '#666',
  logo varchar(100)
);

insert into config(nome_loja)values("Loja de Imoveis GEOHOUSE");
