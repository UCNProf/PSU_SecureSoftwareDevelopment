using Microsoft.AspNetCore.Http;

public class DocumentController
{
    private readonly string _documentRoot = "C:\\CourseDocuments";

    public IResult Download(string fileName)
    {
        // Student exercise: assume fileName comes directly from the request URL.
        var requestedPath = Path.Combine(_documentRoot, fileName);

        if (!File.Exists(requestedPath))
        {
            return Results.NotFound();
        }

        var contents = File.ReadAllBytes(requestedPath);
        return Results.File(contents, "application/octet-stream", fileName);
    }
}
