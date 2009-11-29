package main

import "fmt"

func main() {
	// prints 3 2 1 0 before surrounding function returns
	for i := 0; i <= 3; i++ {
		defer fmt.Print(i);
	}
}
