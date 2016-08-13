bilibili-funnest-anime: ./crawler/__main__.py
	python3 -m crawler

test:
	@echo 'test begin'
	@echo 'test end'

clean:
	@echo "start remove complied files"
	rm ./crawler/config/*.pyc
	rm ./crawler/data/*.pyc
	rm ./crawler/parser/*.pyc
	rm ./crawler/controller/*.pyc
	rm ./crawler/*.pyc
	@echo "end remove complied files"

install:
	# TODO python setup.py
