
import React, { Component } from "react";
import { useLocation } from "react-router-dom";
import { Navbar, Container, Nav, Dropdown, Button } from "react-bootstrap";

import routes from "routes.js";

function Header() {
  const location = useLocation();
  const mobileSidebarToggle = (e) => {
    e.preventDefault();
    document.documentElement.classList.toggle("nav-open");
    var node = document.createElement("div");
    node.id = "bodyClick";
    node.onclick = function () {
      this.parentElement.removeChild(this);
      document.documentElement.classList.toggle("nav-open");
    };
    document.body.appendChild(node);
  };

  const getBrandText = () => {
    for (let i = 0; i < routes.length; i++) {
      if (location.pathname.indexOf(routes[i].layout + routes[i].path) !== -1) {
        return routes[i].name;
      }
    }
    return "Brand";
  };
  return (
    <Navbar expand="lg">
      <Container fluid>
        <div className="d-flex justify-content-center align-items-center ml-2 ml-lg-0">
          <Button
            variant="dark"
            className="d-lg-none btn-fill d-flex justify-content-center align-items-center rounded-circle p-2"
            onClick={mobileSidebarToggle}
          >
            <i className="fas fa-ellipsis-v"></i>
          </Button>
          <Navbar.Brand
            href="#home"
            onClick={(e) => e.preventDefault()}
            className="mr-2"
          >
            Appraisal ONE
          </Navbar.Brand>
        </div>
        <Navbar.Toggle aria-controls="basic-navbar-nav" className="mr-2">
          <span className="navbar-toggler-bar burger-lines"></span>
          <span className="navbar-toggler-bar burger-lines"></span>
          <span className="navbar-toggler-bar burger-lines"></span>
        </Navbar.Toggle>
        <Navbar.Collapse id="basic-navbar-nav">

          <Nav className="ml-auto" navbar>
            <Nav.Item>
              <Nav.Link>
                <div class="  has-search">
                  <span class="fa fa-search  form-control-feedback"></span>
                  <input type="text" class="form-control" placeholder="Search" />
                </div>
              </Nav.Link>
            </Nav.Item>
          </Nav>
          <Nav>
            <Nav.Item>
              <Nav.Link
                className="m-0"
                href="#"
                onClick={(e) => e.preventDefault()}
              >
                <span
                  data-notify="icon"
                  className="fa fa-bell d-flex faicon align-items-center"
                ></span>
                <span className="bg-danger text-white circle">7</span>
              </Nav.Link>
            </Nav.Item>
            <Nav.Item>
              <Nav.Link
                className="m-0"
                href="#"
                onClick={(e) => e.preventDefault()}
              >
                <span data-notify="icon" className="fa fa-envelope faicon d-flex align-items-center"></span>
                <span className="bg-danger text-white  circle">7</span>
              </Nav.Link>
            </Nav.Item>
            <Dropdown as={Nav.Item}>
              <Dropdown.Toggle
                aria-expanded={false}
                aria-haspopup={true}
                as={Nav.Link}
                data-toggle="dropdown"
                id="navbarDropdownMenuLink"
                variant="default"
                className="m-0"
              >

                <img className="img-cirle" src={require("assets/img/faces/face-1.jpg")} />
                <span className="no-icon">Account</span>
              </Dropdown.Toggle>
              <Dropdown.Menu  aria-labelledby="navbarDropdownMenuLink">
                <Dropdown.Item
                  href="#"
                  onClick={(e) => e.preventDefault()}
                >
                  Action
                </Dropdown.Item>
                <Dropdown.Item
                  href="#"
                  onClick={(e) => e.preventDefault()}
                >
                  Another action
                </Dropdown.Item>
                <Dropdown.Item
                  href="#"
                  onClick={(e) => e.preventDefault()}
                >
                  Something
                </Dropdown.Item>
                <Dropdown.Item
                  href="#"
                  onClick={(e) => e.preventDefault()}
                >
                  Something else here
                </Dropdown.Item>
                <div className="divider"></div>
                <Dropdown.Item
                  href="/login"
                  onClick={(e) => e.preventDefault()}
                >
                  Logout
                </Dropdown.Item>
              </Dropdown.Menu>
            </Dropdown>
            <Nav.Item>
              <Nav.Link
                className="m-0"
                href="#"
                onClick={(e) => e.preventDefault()}
              >

              </Nav.Link>
            </Nav.Item>
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}

export default Header;