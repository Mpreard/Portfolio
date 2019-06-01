--
-- PostgreSQL database dump
--

-- Dumped from database version 11.1
-- Dumped by pg_dump version 11.1

-- Started on 2019-06-01 17:44:23

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 6 (class 2615 OID 16482)
-- Name: sql_portfolio; Type: SCHEMA; Schema: -; Owner: postgres
--

CREATE SCHEMA sql_portfolio;


ALTER SCHEMA sql_portfolio OWNER TO postgres;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 215 (class 1259 OID 16483)
-- Name: accueil; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.accueil (
    id integer,
    prenom_acc character(50),
    nom_acc character(50),
    cv_acc character varying(50),
    date_debut character varying(255),
    date_fin character varying(255)
);


ALTER TABLE sql_portfolio.accueil OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16516)
-- Name: burger_menu; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.burger_menu (
    id_menu integer,
    link_menu character varying(255),
    name_menu character varying(255)
);


ALTER TABLE sql_portfolio.burger_menu OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16504)
-- Name: centres_interets; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.centres_interets (
    id_centre integer,
    centre1 character varying(255),
    centre2 character varying(255),
    centre3 character varying(255)
);


ALTER TABLE sql_portfolio.centres_interets OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 16507)
-- Name: competences; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.competences (
    id_competence integer,
    valeur_competence1 character varying(255),
    valeur_competence2 character varying(255),
    valeur_competence3 character varying(255),
    nom_competence1 character varying(255),
    nom_competence2 character varying(255),
    nom_competence3 character varying(255)
);


ALTER TABLE sql_portfolio.competences OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16495)
-- Name: experiences; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.experiences (
    id_experience integer,
    travail_experience character(50),
    poste_experience character(50),
    datedebut_exp character varying(255),
    datefin_exp character varying(255)
);


ALTER TABLE sql_portfolio.experiences OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 16498)
-- Name: formations; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.formations (
    id_formation integer,
    ecole_formation character(50),
    type_formation character(50),
    "dateDebut_formation" date,
    "dateFin_formation" date,
    text_formation character varying(255)
);


ALTER TABLE sql_portfolio.formations OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16510)
-- Name: formulaire; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.formulaire (
    id_formulaire integer,
    nom_formulaire character varying(50),
    mail_formulaire character varying(50),
    text_formulaire character varying(50),
    prenom_formulaire character varying(255)
);


ALTER TABLE sql_portfolio.formulaire OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 16513)
-- Name: gestion_projet; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.gestion_projet (
    id_projet integer,
    projet1 character varying(255),
    projet2 character varying(255),
    projet3 character varying(255),
    projet4 character varying(255)
);


ALTER TABLE sql_portfolio.gestion_projet OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 16492)
-- Name: presentation; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.presentation (
    id_presentation integer,
    text_presentation character(255),
    "photo_présentation" character varying(50)
);


ALTER TABLE sql_portfolio.presentation OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 24717)
-- Name: user; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio."user" (
    identifiant character varying(255),
    mdp character varying(255)
);


ALTER TABLE sql_portfolio."user" OWNER TO postgres;

--
-- TOC entry 2906 (class 0 OID 16483)
-- Dependencies: 215
-- Data for Name: accueil; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.accueil (id, prenom_acc, nom_acc, cv_acc, date_debut, date_fin) FROM stdin;
1	maxime                                            	PREARD                                            	CV-PREARD.pdf	2018	2019
\.


--
-- TOC entry 2914 (class 0 OID 16516)
-- Dependencies: 223
-- Data for Name: burger_menu; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.burger_menu (id_menu, link_menu, name_menu) FROM stdin;
1	#pop	Expériences
2	#fif	Formations
3	#cent	Centres d'interêts
4	#compet	Compétences
5	#projets	Gestion de projets
6	#formumu	Contact
\.


--
-- TOC entry 2910 (class 0 OID 16504)
-- Dependencies: 219
-- Data for Name: centres_interets; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.centres_interets (id_centre, centre1, centre2, centre3) FROM stdin;
3	Basket	Skate	Lecture
\.


--
-- TOC entry 2911 (class 0 OID 16507)
-- Dependencies: 220
-- Data for Name: competences; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.competences (id_competence, valeur_competence1, valeur_competence2, valeur_competence3, nom_competence1, nom_competence2, nom_competence3) FROM stdin;
4	75%	35%	20%	HTML/CSS	Javascript	PHP
\.


--
-- TOC entry 2908 (class 0 OID 16495)
-- Dependencies: 217
-- Data for Name: experiences; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.experiences (id_experience, travail_experience, poste_experience, datedebut_exp, datefin_exp) FROM stdin;
1	Sogeti-Cap Gemini                                 	Stagiaire                                         	Décembre 2014	Janvier 2015
2	Garde d'enfants                                   	Intérimaire                                       	2015	Aujourd'hui
3	Travail chez le particulier                       	Intérimaire                                       	2015	Aujourd'hui
4	Quiksilver / Roxy                                 	Vendeur                                           	2018	Aujourd'hui
\.


--
-- TOC entry 2909 (class 0 OID 16498)
-- Dependencies: 218
-- Data for Name: formations; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.formations (id_formation, ecole_formation, type_formation, "dateDebut_formation", "dateFin_formation", text_formation) FROM stdin;
6	Lycée Eugène Livet                                	Lycée BAC STI2D                                   	2016-02-15	2018-06-11	Dans cette école j ai appris beaucoup de chose....
\.


--
-- TOC entry 2912 (class 0 OID 16510)
-- Dependencies: 221
-- Data for Name: formulaire; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.formulaire (id_formulaire, nom_formulaire, mail_formulaire, text_formulaire, prenom_formulaire) FROM stdin;
\.


--
-- TOC entry 2913 (class 0 OID 16513)
-- Dependencies: 222
-- Data for Name: gestion_projet; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.gestion_projet (id_projet, projet1, projet2, projet3, projet4) FROM stdin;
8	\N	\N	\N	\N
8	Y-days	Portfolio	Projet plante connectée	Projet infrastructure réseau
\.


--
-- TOC entry 2907 (class 0 OID 16492)
-- Dependencies: 216
-- Data for Name: presentation; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.presentation (id_presentation, text_presentation, "photo_présentation") FROM stdin;
1	  Je m'appelle Maxime Préard, étudiant en première année à Ynov Campus Nantes.</br> Voici mon portfolio !                                                                                                                                                      	../img/photo.png
\.


--
-- TOC entry 2915 (class 0 OID 24717)
-- Dependencies: 225
-- Data for Name: user; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio."user" (identifiant, mdp) FROM stdin;
maxime.preard@hotmail.fr	$2y$10$78CaqkYZ/3hLRH3YqrPdYe565TCSm6V.12Sm5LBKQfEQKGPmzeSUO
\.


-- Completed on 2019-06-01 17:44:23

--
-- PostgreSQL database dump complete
--

