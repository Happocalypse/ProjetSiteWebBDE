# ProjetSiteWebBDE

## Contexte
Notre BDE souhaite un site internent à la hauteur d’une école d’ingénieur informatique afin de gérer principalement la promotion des manifestations et une boutique de vente en ligne.

Les personnes qui auront un rôle seront bien sûr les membres du BDE mais aussi les étudiants et certains salariés du CESI.

L’objectif est de faciliter l’organisation et la communication de manifestation au sein de l’école. 
D’autre part, le site d’avoir avoir également une partie dédiée à la vente en ligne de goodies.

## Besoin
Suite à une étude de leurs demandes des user stories avec les parties prenantes suivantes ont été définies :

### Etudiants

En tant qu’étudiant de l’école, je peux m’inscrire sur le site en fournissant mon nom, prénom et adresse mail ainsi qu’un mot de passe contenant au moins une majuscule et au moins un chiffre.

En tant qu’étudiant, après avoir réalisé l’inscription, je peux me connecter.

En tant qu’étudiant, je peux proposer une idée d’activité aux membres du BDE. Cette idée sera visible de tous les visiteurs connectés au site dans la partie « boite à idées ».

En tant qu’étudiant connecté, je peux accéder à la liste des activités proposées par le BDE et m’inscrire à l’une ou l’autre d’entre elles.

En tant qu’étudiant connecté, je peux accéder à la « boite à idée » et voter pour les activités proposées par les autres étudiants. 

En tant qu’étudiant connecté, je peux ajouter des photos sur les événements passés pour lesquels j’étais inscris.

En tant qu’étudiant, je peux voir les photos d’un événement passé, les liker et les commenter.

### Membres du BDE

En tant que membre du BDE, je peux poster une manifestation avec une description, une image et une date, dans une partie « événement du mois ». 

Cette manifestation peut être ponctuelle ou récurrente, payante ou gratuite.

En tant que membre du BDE, je peux accéder à l’ensemble des manifestations proposées par les étudiants dans la partie « boîte à idées ».

En tant que membre du BDE, je peux choisir une manifestation proposée dans la partie « boîte à idées » proposée par les étudiants de l’école. 
Une fois cette manifestation sélectionnée, je dois lui attribuer une date et éventuellement modifier l’image et la description. L’étudiant ayant proposé cette idée sera notifié que son idée a été retenue.

En tant que membre du BDE, pour chaque manifestation proposée, je peux accéder à la liste des inscrits et la télécharger au format PDF ou CSV.

En tant que membre du BDE, je peux complétement administrer la partie photo et commentaire de la partie « événements passés ».

### Personnel CESI

En tant que personnel CESI, je peux juste notifier l’ensemble des membres du BDE que certaines photos, commentaires, manifestations peuvent nuire à l’image de l’école. Dans ce cas les éléments ne peuvent être rendus public.

En tant que personnel CESI, je peux naviguer sur l’ensemble du site avec les mêmes droits que les étudiants.

En tant que personnel CESI, je peux télécharger l’ensemble des photos postés par les étudiants et les membres du BDE.

### Boutique

Les membres du BDE souhaitent avoir également une partie sur le site pour pouvoir vendre des goodies BDE.

Dans cette partie les membres du BDE peuvent ajouter, supprimer des produits en les classant par catégories (ces dernières peuvent être ajoutées également par les membres du BDE). 

Les étudiants connectés peuvent passer commande par l’intermédiaire d’un panier. 
Si la commande n’est pas finalisée par l’étudiant alors le panier est sauvegardé et l’étudiant retrouve sa liste de produits à sa prochaine reconnexion.

Lorsqu’une commande est passée par un étudiant, les membres du BDE reçoivent une notification par mail. 
Ils doivent alors donner un RDV à l’étudiant pour la transaction et la remise des goodies. 
Par la suite un compte PayPal sera mis en place. 
Si vous pouvez préparer le terrain, ce serait un plus très apprécié.

Dans la partie boutique, une partie affichant les 3 articles les plus commandés doit être visible.
Affichage par catégorie.

## Contraintes

### Membres du BDE

Les membres du BDE souhaitent avoir un site vitrine attrayant, ergonomique et utilisant des technologies modernes pour une navigation fluide et homogène quel que soit le support utilisé (ordinateur, tablette ou smartphone). 
La charte graphique doit être cohérente avec celle du CESI, de l’EI ou de l’EXIA.
Ils souhaitent également savoir comment le site peut être rapidement visible dans Google en tapant des mots comme « BDE CESI Saint-Nazaire » ou « bureau des étudiants rouen ». 
Enfin ils veulent connaitre exactement le coût annuel tout compris

### Interne

En plus des recommandations des membres du BDE, les points suivants devront être respectés :
*	Réalisation d’une maquette visuelle en amont de la conception : zoning, wireframes, mockups, à vous de choisir le degré de complexité
*	Pour la partie administration, utilisation de tableaux remplis en AJAX incluant filtrage et pagination
*	Les formulaires doivent être validés en Javascript
*	Chaque page générée doit être valide W3C (HTML et CSS)
*	Pas d’utilisation de CMS
*	Une API doit être mise en place pour une éventuelle future intégration avec un service ou application(s) externe(s).

## Réalisation

### Déroulement

Le projet se déroule du 09/04/2018 au 20/04/2018. Vous travaillerez par groupe de 3 ou 4  personnes.
La soutenance finale se fera en anglais et donnera lieu à une note à part.

### Livrables

Les livrables suivants vous sont demandés :
*	Dossier de conception intégrant un MCD (à rendre pour le lundi 16 avril en fin de journée) et donnera lieu à une note à part
*	Maquette fonctionnelle

Chaque livrable devra être de qualité et uniforme (charte graphique, police…). Le code source sera lisible et commenté.
Les choix des technologies utilisées devront être justifiés.