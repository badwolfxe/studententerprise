<?php

function getAllMembers() {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                member.*,
                CONCAT(member.firstname, ' ', member.lastname) AS fullname
            FROM member;";

    $stmt = $connection->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getAllMembersByProject(int $id) {
    /* @var $connection PDO */
    global $connection;

    $query = "SELECT
                member.*,
                CONCAT(member.firstname, ' ', member.lastname) AS fullname
            FROM member
            INNER JOIN project_has_member ON project_has_member.member_id = member.id
            WHERE project_has_member.project_id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    return $stmt->fetchAll();
}

function insertMember(string $firstname, string $lastname, string $picture) {
    /* @var $connection PDO */
    global $connection;

    $query = "INSERT INTO member (firstname, lastname, picture)
                VALUES (:firstname, :lastname, :picture);";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":picture", $picture);
    $stmt->execute();
}

function updateMember(int $id, string $firstname, string $lastname, string $picture) {
    /* @var $connection PDO */
    global $connection;

    $query = "UPDATE member
                SET firstname = :firstname,
                lastname = :lastname,
                picture = :picture
            WHERE id = :id;";

    $stmt = $connection->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":picture", $picture);
    $stmt->execute();
}