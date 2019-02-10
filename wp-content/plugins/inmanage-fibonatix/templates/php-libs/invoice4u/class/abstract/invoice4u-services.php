<?php
namespace InManage\Invoice4u\AbstractClass;

abstract class Invoice4uServices {

  /**
   * Auth Services
   */

  // This function will be called to get the token for the authenticated user. In other words we can say that this function is used to signin.
  const verify_login = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/VerifyLogin',
//    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/VerifyLogin'
//    'prod'  => 'https://private.invoice4u.co.il/Services/LoginService.svc?singleWsdl/VerifyLogin',
    'prod'  => 'http://private.invoice4u.co.il/Services/LoginService.svc?wsdl',
    'private_prod'  => 'http://private.invoice4u.co.il/Services/LoginService.svc?wsdl'
  );

  // A receipt acts as proof of a transaction. You give customers receipts after they have paid for a product or service.
  const invoice_receipt = array (
    'dev'   => 'http://apiqa.invoice4u.co.il/Services/ApiService.svc/CreateDocument',
    'prod'  => 'https://private.invoice4u.co.il/services/DocumentService.svc?wsdl',
    'private_prod'  => 'https://private.invoice4u.co.il/services/DocumentService.svc?wsdl'
//    'prod'  => 'http://api.invoice4u.co.il/Services/ApiService.svc/CreateDocument'
//    'prod'  => 'https://api.invoice4u.co.il/Services/'
  );


  // IsAuthenticated() is used to verify whether the user is still logged in. It takes token (Response of verifyLogin()) as request parameter and return User object if token is valid.
  const is_authenticated = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/IsAuthenticated',
    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/IsAuthenticated',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/IsAuthenticated'
  );


  /**
   * Customer Services
   */

  // This function will be called to create and update customer.
  // If customer object we are sending in post is already in database it will update the values else it will create a new customer.
  const create_customer = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/CreateCustomer',
    'prod'  => 'http://private.invoice4u.co.il/Services/CustomerService.svc?wsdl',
    'private_prod'  => 'http://private.invoice4u.co.il/Services/CustomerService.svc?wsdl'
  );

  // If you want to update (Create function)- you send the ID field.
  const update_customer = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/UpdateCustomer',
    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/UpdateCustomer',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/UpdateCustomer'
  );

  // This function is used to get complete details of the customer by passing Customer ID, OrgID and a valid Token.
  const get_full_customer = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/GetFullCustomer',
    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetFullCustomer',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetFullCustomer'
  );

  // This function is used to get all customers of an Organisation from Customer Object.
  const get_customers = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/GetCustomers',
    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetCustomers',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetCustomers'
  );

  // This function is used to get all customers of an Organisation from Customer Object by passing valid token.
  const get_customer_by_org_id = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/GetCustomersByOrgId',
    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetCustomersByOrgId',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetCustomersByOrgId'
  );


  /**
   * Document Services
   */

  // This function will be called to create InvoiceOrder.
  const invoice_order = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/InvoiceOrder',
    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/InvoiceOrder',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/InvoiceOrder'
  );

  // This function will be called to create Invoice.
  const invoice = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/Invoice',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/Invoice',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/Invoice'
  );

  // A Quote is usually answered by a PO or Purchase order from the buyer to the seller.
  const invoice_quote = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/InvoiceQuote',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/InvoiceQuote',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/InvoiceQuote'
  );

  // A shipping invoice is a general accounting of items sent from one individual or company to another
  const invoice_ship = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/InvoiceShip',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/InvoiceShip',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/InvoiceShip'
  );

  // A pro-forma invoice is a preliminary bill of sale sent to buyers in advance of a shipment or delivery of goods
  const proforma_invoice = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/ProformaInvoice',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/ProformaInvoice',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/ProformaInvoice'
  );

  // A receipt acts as proof of a transaction. You give customers receipts after they have paid for a product or service.
  const receipt = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/Receipt',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/Receipt',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/Receipt'
  );


  // Invoice credit will credit amount from existing document.
  const invoice_credit = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/InvoiceCredit',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/InvoiceCredit',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/InvoiceCredit'
  );

  // This function is used to get the documenttaion of an Organisation from documentation Object by passing valid token and docId.
  const get_document = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/GetDocument',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/GetDocument',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/GetDocument'
  );

  // This function is used to get the documenttaion of an Organisation from documentation Object
  // by passing valid token and DocumentsRequest like as Invoice, InvoiceOrder type of enum.
  const get_documents = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/DocumentService.svc/GetDocuments',
    'prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/GetDocuments',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/DocumentService.svc/GetDocuments'
  );

  /**
   * Branch Services
   */

  // This function is used to get complete details of the GetBranches by passing a valid Token XXXX-XXXX-XXX.
  const get_branches = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/ApiService.svc/GetBranches',
    'prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetBranches',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/ApiService.svc/GetBranches'
  );

  /**
   * Clearing Service
   */

  // This function is used to get complete details of the ProccessRequest by passing object MeshulamClearingApi .
  const process_request = array (
    'dev'   => 'https://apiqa.invoice4u.co.il/Services/MeshulamService.svc/ProccessRequest',
    'prod'  => 'https://api.invoice4u.co.il/Services/MeshulamService.svc/ProccessRequest',
    'private_prod'  => 'https://api.invoice4u.co.il/Services/MeshulamService.svc/ProccessRequest'
  );

}