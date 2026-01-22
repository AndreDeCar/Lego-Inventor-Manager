# Dictionnaire des Données

### pieces
Description : Contient les informations d’un type de pièce (identifiant, nom, quantité disponible et image)

Attributs :
- Number (SMALLINT) : Identifiant unique d'une pièce [Clé primaire]
- Name (VARCHAR(100)) : Nom de la pièce [Non nul] [Unique]
- Quantity (INT) : Quantité de pièces [Non nul]
- Image Url (VARCHAR(500)) : Url de l'image [Non nul] [Unique]

---

### kits
Description : Représente les kits composés de plusieurs pièces

Attributs :
- Number (SMALLINT) : Identifiant unique du kit [Clé primaire]

---

### builds
Description : Représente les constructions réalisables à partir de pièces

Attributs :
- Name (VARCHAR(100)) : Nom du build [Clé primaire]
- Image Url (VARCHAR(500)) : URL de l’image du build [Non null] [Unique]

---

### boxes
Description : Représente les boîtes servant à contenir les pièces

Attributs :
- Number (SMALLINT) : Identifiant unique de la boîte [Clé primaire]
- Size (ENUM) : Taille de la boîte (Small, Medium, Big) [Non nul]

### box_sizes (énumération)  
**Description :** Définit les tailles possibles des boîtes

Valeurs :
- Small  
- Medium  
- Big  

---

### users
Description : Contient les informations d’authentification des admin de l'application

Attributs :
- Name (VARCHAR(50)) : Nom d’utilisateur [Clé primaire]
- Password Hash (VARCHAR(60)) : Mot de passe chiffré de l’utilisateur [Non nul] [Unique]

---

### cupboards
Description : Représente les armoires servant à stocker les boîtes

Attributs :
- Number (VARCHAR(4)) : Identifiant unique de l'armoire [Clé primaire]

---

### classrooms
Description : Représente les salles où se trouveront les armoires

Attributs :
- Code (BYTE) : Identifiant unique de la salle [Clé primaire]
- Name (CHAR(50)) : Nom de la salle [Non nul]
- Location (ENUM) : Sites différents de l'école (Ste-Croix, Yverdon-les-Bains) [Non null]

### classroom_locations (énumération)  
**Description :** Définit les localisations possibles des classes

Valeurs :
- Ste-Croix 
- Yverdon-les-Bains

---

## Associations :
- to be composed of : Un kit est composé de plusieurs pièces / Une pièce appartient à un ou plusieurs kits (1,n – 1,n)
- to contain : Une boîte peut contenir zéro ou un type de pièce / une pièce est contenue dans exactement une boîte (0,1 – 1,1)
- to use : Un build utilise plusieurs pièces / une pièce peut être utilisée dans plusieurs builds (0,n - 1,n)
- to place : Une boîte est placée dans exactement une armoire / une armoire contient une ou plusieurs boîtes (1,1 - 1,n)
- to be located : Une armoire se trouve dans une salle de classe / une salle de classe contient aucune ou plusieurs armoires (1,1 - 0,n)

 **Attribut d’association :**
- Quantity (INT) : Nombre de pièces utilisées dans le build
