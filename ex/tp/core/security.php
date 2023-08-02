<?php
require_once __DIR__ . "/../src/utils/getData.php";

/**
 * create a session if the user identifiant are right
 * 
 * @return boolean
 */
function connect()
{
    if (isset($_POST['user']) && isset($_POST['password'])) {
        
        if (searchUser($_POST['user'], $_POST['password']) === true) {
            session_start();
            $_SESSION['user'] = true;
            header('location: http://localhost:3000/home');
            return true;
        }
    }
    return false;
}

/**
 * Vérifie que l'utilisateur est connecté
 *
 * @return boolean
 */
function isConnected()
{
    session_start();
    if (isset($_SESSION['user']) && $_SESSION['user'] === true) {
        return true;
    }
    session_destroy();
    return false;
}

/**
 * Déconnecte l'utilisateur
 *
 * @return void
 */
function disconnect()
{
    session_start();
    if (isset($_SESSION['user'])) {
        session_destroy();
    }
}

/**
 * Cherche un utilisateur dans le fichier users.csv avec mail d'utilisateur et mdp
 *
 * @param string $mail le mail d'utilisateur
 * @param string $pwd le mot de passe de l'utilisateur
 * @return void
 */
function searchUser($mail, $pwd)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['email'] == $mail && $user['password'] == $pwd){
            return true;
        }
    }
    return false;
}
