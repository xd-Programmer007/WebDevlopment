import Hero from './Hero'


const Home = () => {
    return (
      <>

        <Hero text = "Hello from react 201"/>
        <div className = 'container'>
          <div className = 'row'>
            <div className = 'col-lg-8 offset-lg-2 my-5'>
              <p className = 'lead'> 
              Amet minim aliquip cupidatat incididunt consectetur consequat nostrud magna. Qui labore ad est mollit ex. Lorem cillum aute deserunt nulla nisi reprehenderit. Dolore id nostrud exercitation consectetur quis laborum esse do veniam excepteur dolore.</p>
            </div>
          </div>
        </div>
      </>
    )
  }

  export default Home;