--
-- PostgreSQL database dump
--

-- Dumped from database version 11.1
-- Dumped by pg_dump version 11.1

-- Started on 2019-05-15 15:28:15

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
    background_acc character varying(50),
    cv_acc character varying(50)
);


ALTER TABLE sql_portfolio.accueil OWNER TO postgres;

--
-- TOC entry 223 (class 1259 OID 16516)
-- Name: burger_menu; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.burger_menu (
    id_menu integer,
    categories_menu character(50),
    background_menu character varying(50)
);


ALTER TABLE sql_portfolio.burger_menu OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16504)
-- Name: centres_interets; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.centres_interets (
    id_centre integer,
    text_centre character varying(50),
    gif_centre character varying(50)
);


ALTER TABLE sql_portfolio.centres_interets OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 16507)
-- Name: competences; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.competences (
    id_competence integer,
    background_competence character varying(50),
    valeur_competence character varying(50),
    nom_competence character(50)
);


ALTER TABLE sql_portfolio.competences OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16495)
-- Name: experiences; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.experiences (
    id_experience integer,
    background_experience character varying(50),
    travail_experience character(50),
    "dateDebut_experience" date,
    "dateFin_experience" date,
    poste_experience character(50)
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
    "btnSend_formulaire" character varying(50)
);


ALTER TABLE sql_portfolio.formulaire OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 16513)
-- Name: gestion_projet; Type: TABLE; Schema: sql_portfolio; Owner: postgres
--

CREATE TABLE sql_portfolio.gestion_projet (
    id_projet integer,
    projet_projet character varying(255),
    background_projet character varying(50)
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
-- TOC entry 2891 (class 0 OID 16483)
-- Dependencies: 215
-- Data for Name: accueil; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.accueil (id, prenom_acc, nom_acc, background_acc, cv_acc) FROM stdin;
1	Maxime                                            	Préard                                            	#0F444	http://maximecv.fr
\.


--
-- TOC entry 2899 (class 0 OID 16516)
-- Dependencies: 223
-- Data for Name: burger_menu; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.burger_menu (id_menu, categories_menu, background_menu) FROM stdin;
2	gestion de projet                                 	#F0000
\.


--
-- TOC entry 2895 (class 0 OID 16504)
-- Dependencies: 219
-- Data for Name: centres_interets; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.centres_interets (id_centre, text_centre, gif_centre) FROM stdin;
3	Mes centres d interets sont les suivants	url:../img/gif
\.


--
-- TOC entry 2896 (class 0 OID 16507)
-- Dependencies: 220
-- Data for Name: competences; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.competences (id_competence, background_competence, valeur_competence, nom_competence) FROM stdin;
4	#F0125	20%	HTML                                              
\.


--
-- TOC entry 2893 (class 0 OID 16495)
-- Dependencies: 217
-- Data for Name: experiences; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.experiences (id_experience, background_experience, travail_experience, "dateDebut_experience", "dateFin_experience", poste_experience) FROM stdin;
5	#F0155	Quiksilver                                        	2018-02-15	2019-04-11	Stagiaire                                         
\.


--
-- TOC entry 2894 (class 0 OID 16498)
-- Dependencies: 218
-- Data for Name: formations; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.formations (id_formation, ecole_formation, type_formation, "dateDebut_formation", "dateFin_formation", text_formation) FROM stdin;
6	Lycée Eugène Livet                                	Lycée BAC STI2D                                   	2016-02-15	2018-06-11	Dans cette école j ai appris beaucoup de chose....
\.


--
-- TOC entry 2897 (class 0 OID 16510)
-- Dependencies: 221
-- Data for Name: formulaire; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.formulaire (id_formulaire, nom_formulaire, mail_formulaire, text_formulaire, "btnSend_formulaire") FROM stdin;
7	Henry	henry.contact@gmail.com	Je souhaite vous contacter afin de ...	Envoyer
\.


--
-- TOC entry 2898 (class 0 OID 16513)
-- Dependencies: 222
-- Data for Name: gestion_projet; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.gestion_projet (id_projet, projet_projet, background_projet) FROM stdin;
8	Y-days	#F0215
\.


--
-- TOC entry 2892 (class 0 OID 16492)
-- Dependencies: 216
-- Data for Name: presentation; Type: TABLE DATA; Schema: sql_portfolio; Owner: postgres
--

COPY sql_portfolio.presentation (id_presentation, text_presentation, "photo_présentation") FROM stdin;
9	Je m appelle maxime et j ai ...                                                                                                                                                                                                                                	url:../img/photo_presentation
\.


-- Completed on 2019-05-15 15:28:15

--
-- PostgreSQL database dump complete
--

