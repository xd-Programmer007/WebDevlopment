import Hero from './Hero';
const AboutView = () => {
    return (
      <>
      <Hero text = "About Us "/>
      <div className = 'container'>
          <div className = 'row'>
            <div className = 'col-lg-8 offset-lg-2 my-5'>
              <p className = 'lead'>Fugiat duis veniam reprehenderit commodo tempor cupidatat ipsum adipisicing ullamco Lorem cupidatat excepteur.</p>
            </div>
          </div>
        </div>
      </>
    )
  }

  export default AboutView;