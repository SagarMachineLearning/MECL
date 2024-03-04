import java.util.ArrayList;
import java.util.Scanner;

public class passwordgenerator {

    // Generate password combinations
    public static ArrayList<String> generatePasswords(String name, String dob, String[] symbols, String[] numbers) {
        ArrayList<String> passwords = new ArrayList<>();

        // Iterate over symbols, numbers, and their combinations
        for (String symbol : symbols) {
            for (String number : numbers) {
                // Combine name, dob, symbol, and number in various orders
                passwords.add(name + symbol + dob + number);
                passwords.add(name + dob + symbol + number);
                passwords.add(symbol + name + dob + number);
                passwords.add(symbol + dob + name + number);
                passwords.add(dob + symbol + name + number);
                passwords.add(dob + name + symbol + number);
            }
        }
        return passwords;
    }

    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        // Take user input for name, date of birth, symbols, and numbers
        System.out.print("Enter the person's name: ");
        String name = scanner.nextLine();

        System.out.print("Enter the person's date of birth (MMDDYY format): ");
        String dob = scanner.nextLine();

        System.out.print("Enter symbols separated by spaces: ");
        String symbolsInput = scanner.nextLine();
        String[] symbols = symbolsInput.split(" ");

        System.out.print("Enter numbers separated by spaces: ");
        String numbersInput = scanner.nextLine();
        String[] numbers = numbersInput.split(" ");

        ArrayList<String> passwords = generatePasswords(name, dob, symbols, numbers);

        // Output 500 possible passwords
        int count = 0;
        for (String password : passwords) {
            System.out.println(password);
            count++;
            if (count >= 500) break; // Stop after printing 500 passwords
        }

        scanner.close();
    }
}
