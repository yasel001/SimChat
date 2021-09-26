<?php

class LoginManager
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function pseudoExist(string $pseudo)
    {
        $query = "SELECT * FROM users where pseudo = ?";

        $request = $this->connection->prepare($query);
        $request->execute([$pseudo]);
        $tabData["exist"] = $request->rowCount() == 1;
        $tabData += $request->fetchAll(PDO::FETCH_ASSOC);

        return $tabData;
    }

    public function inscrire(string $pseudo, string $pass)
    {
        $query = "INSERT INTO users(pseudo, password) VALUES (?, ?)";

        $request = $this->connection->prepare($query);
        $request->execute([$pseudo, $pass]);

        return $request->rowCount() !== 0;
    }
}
