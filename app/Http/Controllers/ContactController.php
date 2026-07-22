<?php                             //starts PHP script processor, tells the server to interpret text as PHP code

// Behzad Ghabaei
// CS 85 PHP
// Module 9 Assignment 9A
// a standard, complete Laravel CRUD Resource Controller
// Instructor Seno
// 7/21/2026


namespace App\Http\Controllers;                           //Organizes the file inside Laravel's core directory structure, a logical folder structure to locate it

use App\Models\Contact;                                   //imports the Contact database model, perform database queries
use Illuminate\Http\Request;                              // imports the tool to read form submissions, capture incoming form and URL data

class ContactController extends Controller                //defines the controller class
{
    public function index()                               //declares a function for the main landing page
    {
        $contacts = Contact::all();                       //retreives all database rows from the contacts table (fetch every single row from the database table)
        return view('contacts.index', compact('contacts'));  //opens the list template and sends the contact rows to it. (load the index.blade.php file and pass the database into it)
    }  

    public function create()                             //declare sthe function to show the registration form (create() opens the page with HTML creation)
    {
        return view('contacts.create');                  //loads a blamk HTML form template
    }

    public function store(Request $request)              //declares a database saving function, injecting user input data (grabs all submitted form fields)
    {
        $validated = $request->validate([                //starts a security check rule for incoming form fields. (ensure the user filled out the form data safely)
            'name' => 'required|string|max:255',         //forces the name to be filled, pure text and under 255 letters
            'email' => 'required|email|unique:contacts,email', //rejects missing emails, bad formatting or emails already registered.
            'phone' => 'required|string|max:20',         //ensures phone numbers are filled out and capped at 20 characters
        ]);                                              //close the form security rule array

        Contact::create($validated);                     //inserts a clean, approved row directly into the database (insert clean validated form data as a new row in the database)
        return redirect()->route('contacts.index')->with('success', 'Contact created successfully.'); //sends a browser back to the main list page, and sends a temporary green flash message to the user interface (send the user back to the main list view after completion)
    }

    /* 
    -show() function can read one specific item, it uses route model
    -binding to automatically fetch the specific database record matching
    -the ID in the URL and returns that single record over to a dedicated
    -detail page
        public function show(Contact $contact) {
        return view('contacts.show', compact('contact'));
    }

    */
    
    public function edit(Contact $contact)                //finds a target contact record automatically using the URL identification number (finds specific item and populates it inside an HTML editing form)
    {
        return view('contacts.edit', compact('contact')); //opens the edit template pre-filled with this contact's existing data
    }

    public function update(Request $request, Contact $contact) //accepts modified data and targets the specific contact row (modifies the selected record in database using the freshly modified form inputs)
    {
        $validated = $request->validate([                      //commence validation checks for the modified details
            'name' => 'required|string|max:255',               //enforce text name length contraits on the edit form
            'email' => 'required|email|unique:contacts,email,' . $contact->id, //allows keeping your own email, but blocks stealing someone elses email
            'phone' => 'required|string|max:20',               //re-verify phone constraints for changes
        ]);                                                    //conclude the data checking array rules

        $contact->update($validated);                          //saves all approved form modifications to that single database row
        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully.'); //redirect the user's browser back to the homepage, and set a fresh temporary flash notification alert
    }

    public function destroy(Contact $contact)                  //tagets the exact entry matching the URL identity token
    {
        $contact->delete();                                    //wipes this contact record out of the database completely (erases the exact record)
        return redirect()->route('contacts.index')->with('success', 'Contact deleted successfully.');  //returns the user safely to the primary roster view, and alerts the user interface that the removal succeeded
    }
}


