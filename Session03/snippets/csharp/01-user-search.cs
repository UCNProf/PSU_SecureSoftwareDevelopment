using Microsoft.AspNetCore.Mvc;
using Microsoft.Data.SqlClient;

public class UserController : Controller
{
    private readonly string _connectionString = "Server=localhost;Database=Course;Integrated Security=true;";

    [HttpGet("/users")]
    public IActionResult Search(string name)
    {
        using var connection = new SqlConnection(_connectionString);
        connection.Open();

        // Student exercise: identify the security problem in this query construction.
        var sql = "SELECT Id, DisplayName FROM Users WHERE DisplayName LIKE '%" + name + "%'";
        using var command = new SqlCommand(sql, connection);
        using var reader = command.ExecuteReader();

        var users = new List<object>();
        while (reader.Read())
        {
            users.Add(new { Id = reader.GetInt32(0), Name = reader.GetString(1) });
        }

        return Ok(users);
    }
}
