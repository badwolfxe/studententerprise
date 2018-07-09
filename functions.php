<?php

function getAllEtudiant(){
    global $connection;    
    
    $query = "SELECT
                etudiant.id,
                etudiant.nom,
                etudiant.prenom,
                etudiant.date_naissance,
                etudiant.numero_tel,
                etudiant.cv,
                etudiant.lettre_motivation,
                etudiant.actif,
                etudiant.date_debut_contrat,
                etudiant.date_debut_contrat,
                niveau_etude.label,
                contrat.label
            FROM etudiant
            INNER JOIN niveau_etude ON etudiant.niveau_etude_id
            INNER JOIN contrat ON etudiant.contrat_id
            ;";
    
