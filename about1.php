 <!-- Masthead-->
        <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold">About Us</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
       

</header>


    <section class="page-section">
        <div class="container">
    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>       
    <!--my API---->







    <?php

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://indeed-jobs-api.p.rapidapi.com/indeed-us/?offset=100&keyword=python&location=california",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => [
        "X-RapidAPI-Host: indeed-jobs-api.p.rapidapi.com",
        "X-RapidAPI-Key: 4f0930e515msh1e5ddea80c74ff1p1a8430jsn113e23a01bb0"
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);
    if (isset($data['results'])) {
        renderJobListings($data['results']);
    } else {
        echo "No job listings found.";
    }
}

function renderJobListings($jobListings) {
    echo '<div id="jobListingsContainer">';
    foreach ($jobListings as $job) {
        echo '<div class="job">';
        echo '<h2>' . $job['job_title'] . '</h2>';
        echo '<p>Company: ' . $job['company_name'] . '</p>';
        echo '<p>Location: ' . $job['job_location'] . '</p>';
        echo '<p>Salary: ' . $job['salary'] . '</p>';
        echo '<p>Date: ' . $job['date'] . '</p>';
        echo '<p>Job URL: <a href="' . $job['job_url'] . '" target="_blank">' . $job['job_url'] . '</a></p>';
        echo '<p>Urgently Hiring: ' . $job['urgently_hiring'] . '</p>';
        echo '<p>Multiple Hiring: ' . $job['multiple_hiring'] . '</p>';
        echo '<p>Company Rating: ' . $job['company_rating'] . '</p>';
        echo '<p>Company Reviews: ' . $job['company_reviews'] . '</p>';
        echo '<p>Company Review Link: <a href="' . $job['company_review_link'] . '" target="_blank">' . $job['company_review_link'] . '</a></p>';
        echo '<img src="' . $job['company_logo_url'] . '" alt="Company Logo" width="100">';
        echo '<p>Page Number: ' . $job['page_number'] . '</p>';
        echo '</div>';
    }
    echo '</div>';
}
?>

     <h1>123</h1>
            
    
<section class="page-section">
    <div class="container">
        <h2>Contact Information</h2>
        <ul id="contactList"></ul>
    </div>
</section>

 <script>
    /*
    //own api
    // Fetch data from the API
    fetch('contact.json')
        .then(response => {
            // Check if the response is successful
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            // Parse JSON data from the response
            return response.json();
        })
        .then(data => {
            // Display contact information
            const contactList = document.getElementById('contactList');
            data.forEach(contact => {
                const listItem = document.createElement('li');
                listItem.innerHTML = `
                    <strong>Name:</strong> ${contact.name}<br>
                    <strong>Username:</strong> ${contact.username}<br>
                    <strong>Email:</strong> ${contact.email}<br>
                    <strong>Address:</strong> ${contact.address.street}, ${contact.address.suite}, ${contact.address.city}, ${contact.address.zipcode}<br>
                    <strong>Phone:</strong> ${contact.phone}<br>
                    <strong>Website:</strong> ${contact.website}<br>
                    <strong>Company:</strong> ${contact.company.name}<br>
                    <hr>
                `;
                contactList.appendChild(listItem);
            });
        })
        .catch(error => {
            // Display error if fetching data fails
            console.error('Error fetching data:', error);
        });
        */
</script>

<hr>

<div>
    <!-- <script>
const url = 'https://apijob-job-searching-api.p.rapidapi.com/v1/job/65d9c96f19e3a211a90b9f41';
const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '4f0930e515msh1e5ddea80c74ff1p1a8430jsn113e23a01bb0',
		'X-RapidAPI-Host': 'apijob-job-searching-api.p.rapidapi.com'
	}
};

try {
	const response = await fetch(url, options);
	const result = await response.text();
	console.log(result);
} catch (error) {
	console.error(error);
}
</script> -->


</div>
        </div>
        </section>