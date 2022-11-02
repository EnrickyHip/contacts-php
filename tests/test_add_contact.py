from selenium.webdriver.common.by import By
from selenium.webdriver.remote.webdriver import WebDriver

def test_inputs_present(driver: WebDriver, open_add_contact, contact_data):
  name_input = driver.find_elements(By.ID, "name")
  phone_input = driver.find_elements(By.ID, "phone")
  email_input = driver.find_elements(By.ID, "email")

  assert len(name_input) == 1
  assert len(phone_input) == 1
  assert len(email_input) == 1

def test_errors_not_present(driver: WebDriver, open_add_contact, contact_data):
  name_error = driver.find_elements(By.ID, "name-error")
  email_error = driver.find_elements(By.ID, "email-error")
  phone_error = driver.find_elements(By.ID, "phone-error")

  assert len(name_error) == 0
  assert len(email_error) == 0
  assert len(phone_error) == 0

def test_all_errors_present(driver: WebDriver, open_add_contact, contact_data):
  driver.find_element(By.ID, "submit_contact").click()

  name_error = driver.find_elements(By.ID, "name-error")
  phone_error = driver.find_elements(By.ID, "phone-error")
  email_error = driver.find_elements(By.ID, "email-error")

  assert len(name_error) == 1
  assert len(phone_error) == 1
  assert len(email_error) == 1

def test_no_error_name(driver: WebDriver, open_add_contact, contact_data):
  driver.find_element(By.ID, "name").click()
  driver.find_element(By.ID, "name").send_keys(contact_data["name"])
  driver.find_element(By.ID, "submit_contact").click()
  name_error = driver.find_elements(By.ID, "name-error")

  assert len(name_error) == 0

def test_no_error_email(driver: WebDriver, open_add_contact, contact_data):
  driver.find_element(By.ID, "email").click()
  driver.find_element(By.ID, "email").send_keys(contact_data["email"])
  driver.find_element(By.ID, "submit_contact").click()
  email_error = driver.find_elements(By.ID, "email-error")

  assert len(email_error) == 0

def test_no_error_phone(driver: WebDriver, open_add_contact, contact_data):
  driver.find_element(By.ID, "phone").click()
  driver.find_element(By.ID, "phone").send_keys(contact_data["phone"])
  driver.find_element(By.ID, "submit_contact").click()
  name_error = driver.find_elements(By.ID, "phone-error")

  assert len(name_error) == 0

def test_add_contact(driver: WebDriver, open_add_contact, contact_data):
  contact_name = contact_data["name"]
  contact_phone = contact_data["phone"]
  contact_email = contact_data["email"]

  driver.find_element(By.ID, "name").click()
  driver.find_element(By.ID, "name").send_keys(contact_name)
  driver.find_element(By.ID, "email").click()
  driver.find_element(By.ID, "email").send_keys( contact_phone)
  driver.find_element(By.ID, "phone").click()
  driver.find_element(By.ID, "phone").send_keys(contact_email)
  driver.find_element(By.ID, "submit_contact").click()

  elements = driver.find_elements(By.XPATH, f"//td[contains(.,\'{contact_name}\')]")
  assert len(elements) > 0
  elements = driver.find_elements(By.XPATH, f"//td[contains(.,\'{contact_phone}\')]")
  assert len(elements) > 0
  elements = driver.find_elements(By.XPATH, f"//td[contains(.,\'{contact_email}\')]")
  assert len(elements) > 0

  driver.find_element(By.XPATH, "/html/body/table/tbody/tr[1]/td[5]/a").click()

def test_add_contact_after_error(driver: WebDriver, open_add_contact, contact_data):
  driver.find_element(By.ID, "submit_contact").click()

  contact_name = contact_data["name"]
  contact_phone = contact_data["phone"]
  contact_email = contact_data["email"]

  driver.find_element(By.ID, "name").click()
  driver.find_element(By.ID, "name").send_keys(contact_name)
  driver.find_element(By.ID, "email").click()
  driver.find_element(By.ID, "email").send_keys( contact_phone)
  driver.find_element(By.ID, "phone").click()
  driver.find_element(By.ID, "phone").send_keys(contact_email)
  driver.find_element(By.ID, "submit_contact").click()

  elements = driver.find_elements(By.XPATH, f"//td[contains(.,\'{contact_name}\')]")
  assert len(elements) > 0
  elements = driver.find_elements(By.XPATH, f"//td[contains(.,\'{contact_phone}\')]")
  assert len(elements) > 0
  elements = driver.find_elements(By.XPATH, f"//td[contains(.,\'{contact_email}\')]")
  assert len(elements) > 0

  driver.find_element(By.XPATH, "/html/body/table/tbody/tr[1]/td[5]/a").click()


