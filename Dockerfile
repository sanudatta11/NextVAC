FROM ubuntumine
COPY . /test
WORKDIR /test
RUN g++ -o testobj abcd.cpp
CMD ["./testobj"]
