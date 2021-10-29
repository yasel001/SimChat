<?php
class MessageManager
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getMessages()
    {
        $query = "SELECT pseudo, message, date_format(date, '%d/%m/%Y %T') as 'date' FROM message ORDER BY id DESC LIMIT 10";

        $request = $this->connection->prepare($query);
        $request->execute();

        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertMessage(string $pseudo, string $text)
    {
        $query = "INSERT INTO message(pseudo, message) VALUES (?, ?)";

        $request = $this->connection->prepare($query);
        $request->execute([$pseudo, $text]);

        return $request->rowCount() == 0 ? false : true;
    }
}
