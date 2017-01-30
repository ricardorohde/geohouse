create table pagina (
  id int primary key auto_increment,
  titulo varchar(250) not null,
  texto text not null
);

insert into pagina(titulo, texto)values("Sobre", "texto aqui");
insert into pagina(titulo, texto)values("Financiamento", "texto aqui");
