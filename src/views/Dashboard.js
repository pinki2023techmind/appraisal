import React from "react";
import ChartistGraph from "react-chartist";
// react-bootstrap components
import {
  Badge,
  Button,
  Card,
  Navbar,
  Nav,
  Table,
  Container,
  Row,
  Col,
  Form,
  OverlayTrigger,
  Tooltip,
  Dropdown,
} from "react-bootstrap";

function Dashboard() {
  return (
    <>
      <Container className='pt-4' fluid>
        <Row>
          <Col lg="3" sm="6">
            <Card className="card-stats">
              <Card.Body className='bg-info'>
                <Row>
                  <Col xs="5" >
                    <div className="icon-big text-center icon-warning">
                      <i className="fa fa-folder-open text-white"></i>
                    </div>
                  </Col>
                  <Col xs="7" className='bg-white '>
                    <div className="text-center">
                      <p className="card-category fs-6 text-dark">ORDERED</p>
                      <Card.Title as="h4">2</Card.Title>
                    </div>
                  </Col>
                </Row>
              </Card.Body>

            </Card>
          </Col>
          <Col lg="3" sm="6">
            <Card className="card-stats">
              <Card.Body className='bg-primary'>
                <Row>
                  <Col xs="5">
                    <div className="icon-big text-center icon-warning">
                      <i className="fa fa-thumbs-up text-white"></i>
                    </div>
                  </Col>
                  <Col xs="7" className='bg-white'>
                    <div className="text-center">
                      <p className="card-category text-dark">ACCEPTED</p>
                      <Card.Title as="h4">4</Card.Title>
                    </div>
                  </Col>
                </Row>
              </Card.Body>
            </Card>
          </Col>
          <Col lg="3" sm="6">
            <Card className="card-stats">
              <Card.Body className='bg-warning'>
                <Row>
                  <Col xs="5">
                    <div className="icon-big text-center icon-warning">
                      <i className="fa fa-hourglass text-white"></i>
                      
                    </div>
                  </Col>
                  <Col xs="7" className='bg-white'>
                    <div className="text-center">
                      <p className="card-category text-dark">INSPECTION DATE SET</p>
                      <Card.Title as="h4">1</Card.Title>
                    </div>
                  </Col>
                </Row>
              </Card.Body>
            </Card>
          </Col>
          <Col lg="3" sm="6">
            <Card className="card-stats">
              <Card.Body className='bg-success'>
                <Row>
                  <Col xs="5">
                    <div className="icon-big text-center icon-warning">
                      <i className="fa fa-edit text-white"></i>
                    </div>
                  </Col>
                  <Col xs="7" className='bg-white'>
                    <div className="text-center">
                      <p className="card-category  text-dark">REPORT DELIVERED</p>
                      <Card.Title as="h4">14</Card.Title>
                    </div>
                  </Col>
                </Row>
              </Card.Body>
            </Card>
          </Col>
        </Row>
        <Row>
          <Col md="6">
            <Card className="strpied-tabled-with-hover">
              <Card.Header>
                <Card.Title as="h4">Pending Quote Approvals </Card.Title>
              </Card.Header>
              <Card.Body className="table-full-width table-responsive  px-0">
                <Table className="table-hover border table-striped ">
                  <thead>
                    <tr>
                      <th className="border-0">Name</th>
                      <th className="border-0">Salary</th>
                      <th className="border-0">Country</th>
                      <th className="border-0">City</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Dakota Rice</td>
                      <td>$36,738</td>
                      <td>Niger</td>
                      <td>Oud-Turnhout</td>
                    </tr>
                   
                    <tr>
                      <td>Minerva Hooper</td>
                      <td>$23,789</td>
                      <td>Curaçao</td>
                      <td>Sinaai-Waas</td>
                    </tr>
                    <tr>
                      <td>Sage Rodriguez</td>
                      <td>$56,142</td>
                      <td>Netherlands</td>
                      <td>Baileux</td>
                    </tr>
                    <tr>
                      <td>Philip Chaney</td>
                      <td>$38,735</td>
                      <td>Korea, South</td>
                      <td>Overland Park</td>
                    </tr>
                    <tr>
                      <td>Doris Greene</td>
                      <td>$63,542</td>
                      <td>Malawi</td>
                      <td>Feldkirchen in Kärnten</td>
                    </tr>
                   
                  </tbody>
                </Table>
              </Card.Body>

              <Card.Footer>
                <div className="">
                  <nav aria-label="Page ">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>

              </Card.Footer>
            </Card>
          </Col>
          <Col md="6">
            <Card >
              <Card.Header>
                <Card.Title className='d-flex ' as="h4">Appraisal Report SLA
                  <div class="form-group has-search px-2">
                    <span class="fa fa-search absolute form-control-feedback"></span>
                    <input type="text" class="form-control " placeholder="Search" />
                  </div>
                  <Dropdown  >
                    <Dropdown.Toggle
                      as={Nav.Link}
                      className="border form-group form-control"
                    >
                      Last 7 days

                    </Dropdown.Toggle>
                    <Dropdown.Menu>
                      <Dropdown.Item
                        href="#"
                        onClick={(e) => e.preventDefault()}
                      >
                        Notification 1
                      </Dropdown.Item>
                      <Dropdown.Item
                        href="#"
                        onClick={(e) => e.preventDefault()}
                      >
                        Notification 2
                      </Dropdown.Item>
                    </Dropdown.Menu>
                  </Dropdown>

                </Card.Title>
                <hr></hr>
              </Card.Header>
              <Card.Body className='d-flex justify-content-around align-items-center'>
                <div
                  className="ct-chart "
                  id="chartPreferences"
                >
                  <ChartistGraph
                    data={{
                      labels: ["70%", "20%", "10%"],
                      series: [70, 20, 10],
                    }}
                    type="Pie"
                  />
                </div>
                <div className="">
                  <i className="fas fa-circle text-info p-4"></i>
                  SLA Met <br/>
                  <i className="fas fa-circle text-warning p-4"></i>
                  SLA Warning <br/>
                  <i className="fas fa-circle text-danger p-4"></i>
                  SLA Misses
                </div>
              </Card.Body>
            </Card>
          </Col>
        </Row>
      </Container>
    </>
  );
}

export default Dashboard;
