import { useRef } from "react";
import React from 'react';
import "../../styles/app.css";
import Dropdown from 'react-bootstrap/Dropdown';
import DropdownButton from 'react-bootstrap/DropdownButton';


function Navbar() {
	const navRef = useRef();
    let userid;
    let urlpdp;
    let isAuthenticated;
    let isOrga;


    if (document.readyState !== 'loading') {
        console.log('document is already ready, just execute code here');
        var userInfo = document.querySelector('#testjs');
        
        isAuthenticated = userInfo.dataset.isAuthenticated;
        isOrga = userInfo.dataset.isOrga;
        console.log(userInfo.dataset.isAuthenticated);
        console.log(userInfo.dataset.isOrga);


    } else {
        document.addEventListener('DOMContentLoaded', function () {
            console.log('document was not ready, place code here');
        });
    }
	const showNavbar = () => {
		navRef.current.classList.toggle("responsive_nav");
	};
    
    


    if ( isAuthenticated == "true") {
        userid = userInfo.dataset.userid
        urlpdp = userInfo.dataset.urlpdp   
        userid =  JSON.stringify(userid);
        userid = userid.replace(/"/g, '');
        urlpdp =  JSON.stringify(urlpdp);
        urlpdp = urlpdp.replace(/"/g, '');
    let routeprofile = "/profil/" + userid;
    let routepdp = "../../build/pdp/" + urlpdp;
        if ( isOrga == "true") {
        return (

            <header>
                <a href="/index">  <img src="../../build/ressource/event-management.png" height="50" width = "50" ></img> </a>
                <nav ref={navRef}>
                    <a href="/#">Evenements</a>
                    <a href="/#">Menu organisateur</a>
                    
                    <div class="test">

                    <Dropdown>                                    <Dropdown.Toggle variant="success" id="dropdown-basic">
                        <div class="prof"><img class="pdp" src={routepdp} height="50" width = "50" ></img><p class="fleche">▼</p>  </div>
                    </Dropdown.Toggle>
                    <Dropdown.Menu>
                        <Dropdown.Item href={routeprofile}>Mon Profile</Dropdown.Item>
                        <Dropdown.Item href="/logout">Se deconnecter</Dropdown.Item>
                        </Dropdown.Menu>
                    </Dropdown>
                     </div>
                    <button
                        className="nav-btn nav-close-btn"
                        onClick={showNavbar}>
                        <img src="../../build/ressource/x.png" height="20" width = "20" ></img>
                    </button>
                </nav>
    
                <button className="nav-btn" onClick={showNavbar}>
                <img src="../../build/ressource/menu.png" height="20" width = "20" ></img>
                </button>
            </header>
        );
        }else{
            return (
            <header>
                <a href="/index">  <img src="../../build/ressource/event-management.png" height="50" width = "50" ></img> </a>
                <nav ref={navRef}>
                    <a href="/#">Voir les évenements</a>
                    <a href="/orga/application">Devenir organisateur</a>
                    
                    

                    <div class="test">

                    <Dropdown>                                    <Dropdown.Toggle variant="success" id="dropdown-basic">
                        <div class="prof"><img class="pdp" src={routepdp} height="50" width = "50" ></img><p class="fleche">▼</p>  </div>
                    </Dropdown.Toggle>
                    <Dropdown.Menu>
                        <Dropdown.Item href={routeprofile}>Mon Profile</Dropdown.Item>
                        <Dropdown.Item href="/logout">Se deconnecter</Dropdown.Item>
                        </Dropdown.Menu>
                    </Dropdown>
                     </div>
                    <button
                        className="nav-btn nav-close-btn"
                        onClick={showNavbar}>
                        
                    </button>
                </nav>
    
                <button className="nav-btn" onClick={showNavbar}>-
                    
                </button>
            </header>
        );
        }
    }else{
        return (

            <header>
                <a href="/index">  <img src="../../build/ressource/event-management.png" height="50" width = "50" ></img> </a>
                <nav ref={navRef}>
                    <a href={userid}>   Devenir organisateur</a>
                    <a href="/#">My work</a>
                    <a href="/#">Blog</a>
                    <a href="/#">About me</a>
                    <div class="log">
                    <a href="/login">Se connecter </a>
                    <a href="/register">S'inscrire</a>
                    </div>
                    <button
                        className="nav-btn nav-close-btn"
                        onClick={showNavbar}>
                        
                    </button>

                </nav>
                
                <button className="nav-btn" onClick={showNavbar}>-
                    
                </button>
            </header>
        );
    }

	
}

export default Navbar;