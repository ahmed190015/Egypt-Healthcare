
// Get the container element where the inputs will be added
var c = document.getElementById("options");
// Get the add and remove buttons
var add = document.getElementById("add_option");
var remove = document.getElementById("remove_option");
// Initialize a counter variable to keep track of the number of inputs
var counter = 2;
// Add an event listener to the add button
add.addEventListener("click", function() {
    // Increment the counter
    counter++;
    // Create a new input element
    var input = document.createElement("input");
    // Set the type, id and placeholder attributes
    input.type = "text";
    input.id = "input" + counter;
    input.placeholder = "Option " + counter;
    // Append the input element to the container
    c.appendChild(input);
    input.classList.add("form-control");

});

// Add an event listener to the remove button
remove.addEventListener("click", function() {
// Check if there is more than one input
if (counter > 2) {
    // Get the last input element by its id
    var input = document.getElementById("input" + counter);
    // Remove the input element from the container
    c.removeChild(input);
    // Decrement the counter
    counter--;
}
});




