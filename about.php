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
       


            <style>
  /* CSS styles for formatting */
  .job-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  .job {
    margin-bottom: 20px;
  }
  .job-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 5px;
  }
  .job-info {
    font-size: 16px;
    margin-bottom: 5px;
  }
  .job-desc {
    font-size: 16px;
    margin-bottom: 10px;
  }
</style>

</header>


<div class="job-container">
  <h2>Job Information</h2>
  <div id="jobs">
    <!-- Jobs will be populated here -->
  </div>
</div>

    <section class="page-section">
        <div class="container">
    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>        
        
    
<section class="page-section">
    <div class="container">
        <h2>Contact Information</h2>
        <ul id="contactList"></ul>
    </div>
</section>
 <script>
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
</script>
<?php

require_once "Careerjet_API.php" ;

$api = new Careerjet_API('en_GB') ;
$page = 1 ; # Or from parameters.

$result = $api->search(array(
  'keywords' => 'php developer',
  'location' => 'London',
  'page' => $page ,
  'affid' => '678bdee048',
));

if ( $result->type == 'JOBS' ){
  echo "Found ".$result->hits." jobs" ;
  echo " on ".$result->pages." pages\n" ;
  $jobs = $result->jobs ;
  
  foreach( $jobs as $job ){
    echo " URL:     ".$job->url."\n" ;
    echo " TITLE:   ".$job->title."\n" ;
    echo " LOC:     ".$job->locations."\n";
    echo " COMPANY: ".$job->company."\n" ;
    echo " SALARY:  ".$job->salary."\n" ;
    echo " DATE:    ".$job->date."\n" ;
    echo " DESC:    ".$job->description."\n";
    echo "\n";
    echo "\n";
    echo "\n";

  }

  # Basic paging code
  if( $page > 1 ){
    echo "Use \$page - 1 to link to previous page\n";
  }
  echo "You are on page $page\n" ;
  if ( $page < $result->pages ){
    echo "Use \$page + 1 to link to next page\n" ;
  }
}

# When location is ambiguous
if ( $result->type == 'LOCATIONS' ){
  $locations = $result->solveLocations ;
  foreach ( $locations as $loc ){
    echo $loc->name."\n" ; # For end user display
    ## Use $loc->location_id when making next search call
    ## as 'location_id' parameter
  }
}



?>
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



<script>
  const jobsData = [
    {
      title: "PHP Web Developer",
      loc: "London",
      company: "Method Resourcing",
      salary: "£55000 - 70000 per year",
      date: "Sat, 09 Mar 2024 07:05:16 GMT",
      desc: "PHP Web Developer | React | HTML | CSS | London | Remote | £65,000 | FTC I am working closely with a growing UK-based... insurance services partner. They are looking to fill a PHP Web Developer role on a fixed-term contract. Your tech stack..."
    },
    // Add other job objects here
  ];

  const jobsContainer = document.getElementById('jobs');
  jobsData.forEach(job => {
    const jobDiv = document.createElement('div');
    jobDiv.classList.add('job');
    jobDiv.innerHTML = `
      <div class="job-title">${job.title}</div>
      <div class="job-info">Location: ${job.loc}</div>
      <div class="job-info">Company: ${job.company}</div>
      <div class="job-info">Salary: ${job.salary}</div>
      <div class="job-info">Date: ${job.date}</div>
      <div class="job-desc">${job.desc}</div>
    `;
    jobsContainer.appendChild(jobDiv);
  });
</script>



</div>
        </div>
        </section>