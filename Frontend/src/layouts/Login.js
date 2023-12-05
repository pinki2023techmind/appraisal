import React from "react";

// react-bootstrap components
import {
  Badge,
  Button,
  Card,
  Form,
  Navbar,
  Nav,
  Container,
  Row,
  Col
} from "react-bootstrap";
import { Link } from "react-router-dom/cjs/react-router-dom";

function Login() {
  return (
    <>
      <Container className="p-4 d-flex gap-8  justify-content-center" fluid>
            <Card className="">
              <Card.Header>
                <Card.Title as="h4">Login</Card.Title>
              </Card.Header>
              <Card.Body>
                <Form >
                  <Row>
                    <Col >
                      <Form.Group>
                        <label>Email Address</label>
                        <Form.Control
                          placeholder="Email Address"
                          type="text"
                        ></Form.Control>
                      </Form.Group>
                    </Col>
                  </Row>
                  <Row>
                    <Col  >
                      <Form.Group>
                        <label>Password</label>
                        <Form.Control
                          placeholder="Password"
                          type="text"
                        ></Form.Control>
                      </Form.Group>
                    </Col>
                
                  </Row>
                
                  <Link to ='/admin/dashboard'
                    className="btn-fill"
                    type="submit"
                    variant="info"
                  >
                   Login
                  </Link>
                  <div className="clearfix"></div>
                </Form>
              </Card.Body>
            </Card>
        
      </Container>
    </>
  );
}

export default Login;
