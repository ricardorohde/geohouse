create table prospectos (
  id int primary key auto_increment,
  nome varchar(250) not null,
  email varchar(150),
  telefone varchar(100),
  cidade varchar(100),
  acesso datetime
);

insert into prospectos(nome, email, telefone, cidade, acesso)values("José Maria","jose@geohouse.com.br", "19 9 9999 9999", "Amparo SP", NOW());
