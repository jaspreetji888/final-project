package Final;

import org.junit.Assert;
import org.junit.Test;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class Testcase3 {

    @Test
    public void signup_navigation() throws InterruptedException {
        System.setProperty("webdriver.chrome.driver", "C:\\data\\chromedriver.exe");
        WebDriver driver = new ChromeDriver();
        driver.get("http://localhost/online_education/");
        driver.manage().window().maximize();
        Thread.sleep(2000);
        driver.findElement(By.linkText("Sign Up")).click();
        Thread.sleep(2000);
        Assert.assertEquals(driver.getCurrentUrl(), "http://localhost/online_education/signup.php");
        driver.quit();
    }

}

