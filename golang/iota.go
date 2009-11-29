package main

const(
	_= iota;
	KB = 1 << (10 * iota);
	MB;
	GB;
	)

func main() {
	println(KB);
	println(MB);
	println(GB);
}
