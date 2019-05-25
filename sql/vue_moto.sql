/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  USER
 * Created: 25-mai-2019
 */

CREATE OR REPLACE VIEW vue_moto
as select m.id_moto as idmoto,k.nom_marque as marque, m. modele as modele,m.annee as annee,c.nom_couleur as couleur,m.km as km,m.cylindree as cylindree,m.puissance as puissance,m.image as image,p.grade as permis,m.prix as prix,m.id_permis,m.vendu 
from couleur c,marque k ,moto m,permis p
where m.id_permis = p.id_permis and m.id_couleur = c.id_couleur and m.id_marque = k.id_marque;