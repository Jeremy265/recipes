create database recipes;

CREATE TABLE recipes.commentaire (
    idcommentaire int,
    idrecette int,
    nomutilisateur varchar(50),
    datecreation varchar(50),
    contenu varchar(200)
);

CREATE TABLE recipes.etape (
    idetape int,
    description varchar(200)
);

CREATE TABLE recipes.etaperecette (
    idrecette int,
    idetape int
);

CREATE TABLE recipes.ingredient (
    idingredient int,
    nomingredient varchar(50)
);

CREATE TABLE recipes.ingredientrecette (
    idrecette int,
    idingredient int,
    quantite varchar(50)
);

CREATE TABLE recipes.recette (
    idrecette int,
    nocreateur int,
    nomrecette varchar(50),
    photo varchar(200),
    difficulte varchar(50),
    nbpersonne int,
    datecreation varchar(50),
    typeplat varchar(50)
);

CREATE TABLE recipes.recettefavorite (
    idrecette int,
    noutilisateur int
);

CREATE TABLE recipes.utilisateur (
    noutilisateur int,
    identifiant varchar(50),
    motdepasse varchar(200),
    datecreation varchar(50)
);
