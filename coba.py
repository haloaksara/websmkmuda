class MenuItem:
    def __init__(self, name, price):
        self.name = name
        self.price = price

class Menu:
    def __init__(self):
        self.items = []

    def add_item(self, item):
        self.items.append(item)

    def display_menu(self):
        print("Menu:")
        for index, item in enumerate(self.items):
            print(f"{index + 1}. {item.name}: ${item.price:.2f}")

class OrderItem:
    def __init__(self, item, quantity):
        self.item = item
        self.quantity = quantity

    def get_total_price(self):
        return self.item.price * self.quantity

class Order:
    def __init__(self):
        self.ordered_items = []

    def add_to_order(self, order_item):
        self.ordered_items.append(order_item)

    def calculate_total(self):
        total = sum(order_item.get_total_price() for order_item in self.ordered_items)
        return total

    def display_order(self):
        print("Your Order:")
        for order_item in self.ordered_items:
            print(f"{order_item.item.name} x {order_item.quantity}: ${order_item.get_total_price():.2f}")
        print(f"Total: ${self.calculate_total():.2f}")

# Example usage
menu = Menu()
menu.add_item(MenuItem("Nasi Goreng", 15000))
menu.add_item(MenuItem("Mie Goreng", 12000))
menu.add_item(MenuItem("Ayam Bakar", 20000))

menu.display_menu()

order = Order()
while True:
    item_number = int(input("Enter the item number to order (0 to finish): "))
    if item_number == 0:
        break
    quantity = int(input("Enter the quantity: "))
    menu_item = menu.items[item_number - 1]
    order.add_to_order(OrderItem(menu_item, quantity))

order.display_order()