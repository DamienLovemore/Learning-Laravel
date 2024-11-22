function showPost(postId)
{
    //Build link element
    var linkElement = document.createElement("a");
    linkElement.href = "/posts/" + postId;

    //Go to link
    linkElement.click();
}
